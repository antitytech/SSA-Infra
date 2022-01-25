<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
}
