<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('message', 'Account Created Successfully!');
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
    public function checkemail(Request $req)
    {
        $email = $req->email;
        $emailcheck = User::where('email', $email)->count();
        if ($emailcheck < 1) {
            return redirect()->back()->with('error', 'User Not Exists!');
        }
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => Str::random(60),
            'created_at' => Carbon\Carbon::now()
        ]);
        $tokenData = DB::table('password_resets')
            ->where('email', $email)->first();
        if ($this->sendResetEmail($email, $tokenData->token)) {
            return redirect()->back()->with('message', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }
    private function sendResetEmail($email, $token)
    {
        $user = DB::table('users')->where('email', $email)->first();
        $link = url('/') . '/password/reset/' . $token . '?email=' . urlencode($user->email);
        try {
            Mail::to($email)->send(new \App\Mail\MyTestMail($link));
            return true;
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function resetPassword(Request $request)
    {
        //Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required',
            'password_token' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }
        $password = $request->password;
        $tokenData = DB::table('password_resets')
            ->where('token', $request->password_token)->first();
        if (!$tokenData) return view('auth.passwords.email');
        $user = User::where('email', $tokenData->email)->first();
        if (!$user) return redirect()->back()->withErrors(['email1' => 'Email not found']);
        $user->password = Hash::make($password);
        $user->update();
        DB::table('password_resets')->where('email', $user->email)
            ->delete();
        if ($user) {
            return redirect()->route('login')->with('message','Password Changed Successfully!');
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }
    }
    public function reset_form(Request $request)
    {
        $token = $request->segment(3);
        $email = $request->email;
        return view('user.auth.reset', compact('token', 'email'));
    }

}
