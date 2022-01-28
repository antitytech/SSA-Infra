<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->count();
        return view('admin.index', compact('users'));
    }
    public function register()
    {
        return view('admin.auth.register');
    }
    public function signin()
    {
        return view('admin.auth.signin');
    }
    public function users()
    {
        $user = User::get();
        return view('admin.users.users', compact('user'));
    }
    public function forget()
    {
        return view('admin.auth.forget');
    }
    public function platforms()
    {
        return view('admin.platform.table');
    }
    public function projects()
    {
        return view('admin.projects.table');
    }
    public function investments()
    {
        return view('admin.invest.table');
    }
    public function transactions()
    {
        return view('admin.transactions.table');
    }

    public function opportunities()
    {
        return view('admin.opportunities.table');
    }
    public function management()
    {
        return view('admin.management.table');
    }
    public function profile()
    {
        return view('admin.auth.profile');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/admin/login');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:35',
            'email' => 'required|unique:admins|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->back()->with('message', 'Account Created Successfully!');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin/dashboard');
        }
        return redirect()->back()->with('error', 'Email or Password is Invalid!');
    }
    public function status0(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = User::find($update_id);
            $userr->status = 0;
            $userr->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        }
    }
    public function status1(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = User::find($update_id);
            $userr->status = 1;
            $userr->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        }
    }
    public function profile0(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = User::find($update_id);
            $userr->response = 0;
            $userr->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        }
    }
    public function profile1(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = User::find($update_id);
            $userr->response = 1;
            $userr->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        }
    }
}
