<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use function Ramsey\Uuid\v1;

class GoogleController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected $providers = [
        'github', 'facebook', 'google', 'twitter', 'linkedin'
    ];

    public function show()
    {
        return view('user.auth.signin');
    }

    public function redirectToProvider($driver)
    {
        if (!$this->isProviderAllowed($driver)) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }


    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // check for email in returned user
        return empty($user->email)
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }

    protected function sendSuccessResponse()
    {
        return redirect()->intended('/');
    }

    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('social.login')
            ->withErrors(['error' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    protected function loginOrCreateAccount($providerUser, $driver)
    {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();

        // if user already found

        if ($user) {

            $user->update([
                'avatar' => $providerUser->avatar,
                'provider' => $driver,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token,
            ]);
            $user->LoginWith = $driver;
            $user->save();
            Auth::login($user, true);

            return redirect()->intended('/');
        } else {
            $otp = mt_rand(100000, 999999);
            // create a new user
            $emails = $providerUser->getEmail();
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'avatar' => $providerUser->getAvatar(),
                'provider' => $driver,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
                'password' => '',
            ]);
            $user->otp = $otp;
            $user->LoginWith = $driver;

            $user->save();

            Auth::login($user, true);
            Mail::send('emails.verifyemail', ['otp' => $otp], function ($message) use ($emails) {
                $message->to($emails);
                $message->subject('Verify Email');
            });
            $email = $providerUser->getEmail();
            return $this->saveProfile($email);
        }
    }
    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }
    public function saveProfile($email)
    {
        $Company = new Company();
        $Company->email = $email;
        $Company->save();
        if ($this->saveemail($email)) {
            return redirect('/')->with('message', trans('Account Created Successfully!'));
        }
    }
    public function saveemail($email)
    {
        $Company = new Profile();
        $Company->email = $email;
        $Company->save();
        return redirect('/')->with('message', trans('Account Created Successfully!'));
    }
}
