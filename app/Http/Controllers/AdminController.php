<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Employees;
use App\Models\Profile;
use App\Models\RequestProject;
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
        $individual = User::where('role', 'Individual')->count();
        $Company = User::where('role', 'Company')->count();
        $projects = RequestProject::count();
        return view('admin.index', compact('users', 'individual', 'Company', 'projects'));
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
    public function individualusers()
    {
        $user = User::where('role','Individual')->get();
        return view('admin.users.individual', compact('user'));
    }
    public function companyusers()
    {
        $user = User::where('role','Company')->get();
        return view('admin.users.company', compact('user'));
    }
    public function individualProfile($id)
    {
        $user = Profile::where('user_id', $id)->get();
        return view('admin.users.profile', compact('user'));
    }
    public function companyProfile($id)
    {
        $user = Company::where('user_id', $id)->get();
        return view('admin.users.companyprofile', compact('user'));
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
        $projects = RequestProject::get();
        return view('admin.management.table', compact('projects'));
    }
    public function profile()
    {
        return view('admin.auth.profile');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/admin/login/get-admin-login');
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

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/admin/dashboard/get-admin-dashboard');
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
    public function employee0(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = Employees::find($update_id);
            $userr->status = 0;
            $userr->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        }
    }
    public function employee1(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = Employees::find($update_id);
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
