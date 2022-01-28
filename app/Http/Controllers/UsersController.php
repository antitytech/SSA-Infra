<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function register()
    {
        return view('user.auth.register');
    }
    public function signin()
    {
        return view('user.auth.signin');
    }
    public function forget()
    {
        return view('user.auth.forget');
    }
    public function change()
    {
        return view('user.auth.changePassword');
    }
    public function platforms()
    {
        return view('user.platform.table');
    }
    public function projects()
    {
        return view('user.projects.table');
    }
    public function investments()
    {
        return view('user.invest.table');
    }
    public function transactions()
    {
        return view('user.transactions.table');
    }
    public function email()
    {
        return view('user.auth.email');
    }
    public function choose()
    {
        return view('user.auth.select');
    }
    public function individual()
    {
        return view('user.auth.individual');
    }

    public function opportunities()
    {
        return view('user.opportunities.table');
    }
    public function management()
    {
        return view('user.management.table');
    }
    public function profile()
    {
        return view('user.auth.profile');
    }
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|max:6',
        ]);
        $id = Auth::guard('web')->user()->id;
        $user = Auth::guard('web')->user()->otp == $request->otp;
        if ($user == true) {
            $userr = User::find($id);
            $userr->v_otp = 1;
            $userr->otp = NULL;
            $userr->save();
            return redirect('/user/choose-role')->with('message', 'Email Verified Successfully!');
        }
        else
        {
            return redirect()->back()->with('message', 'Otp is Invalid!');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/user/login');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:35',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
        $otp = mt_rand(100000, 999999);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->otp = $otp;
        $user->save();

        Mail::send('emails.verifyemail', [ 'otp' => $otp], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Verify Email');
        });

        return redirect()->back()->with('message', 'Account Created Successfully!');
    }
    public function resend(Request $request)
    {
        $otp = mt_rand(100000, 999999);
        $email =Auth::guard('web')->user()->email;
        $user = User::where('email', $email)->first();
        $user->otp = $otp;
        $user->save();

        Mail::send('emails.verifyemail', ['otp' => $otp], function ($message) use ($request) {
            $message->to(Auth::guard('web')->user()->email);
            $message->subject('Verify Email');
        });
        return redirect()->back()->with('success', 'Email Send Successfully!');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/');
        }
        return redirect()->back()->with('error', 'Email or Password is Invalid!');
    }
    public function changePassword (Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'min:5|different:password',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('error', 'Form Validation is not correct');
            return redirect()->route('changePassword');
        } else {
            $id = Auth::guard('web')->user()->id ?? '';
            $user = User::find($id);
            if (Hash::check($request->password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                $request->session()->flash('success', 'Password changed Successfully');
                return redirect()->route('changePassword');
            } else {
                $request->session()->flash('error', 'Old Password does not match');
                return redirect()->route('changePassword');
            }
        }
    }
}
