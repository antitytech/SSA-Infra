<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\DataRoom;
use App\Models\Employees;
use App\Models\platform;
use App\Models\Profile;
use App\Models\ProjectContracts;
use App\Models\ProjectOperations;
use App\Models\ProjectOverview;
use App\Models\ProjectShareholders;
use App\Models\ProjectSite;
use App\Models\ProjectTaxes;
use App\Models\ProjectTeaser;
use App\Models\RequestProject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon;
use Illuminate\Support\Str;

use function Ramsey\Uuid\v1;

class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user()->id;
        $platform = DB::table('platforms')->where('user_id', $user)->count();
        $projects = DB::table('project_overviews')->where('user_id', $user)->count();
        $request_projects = RequestProject::where('project_user_id', $user)->count();
        $Opportunities = ProjectOverview::count();
        $investments = RequestProject::where('user_id', $user)->count();
        return view('user.index', compact('projects', 'platform', 'request_projects', 'investments', 'Opportunities'));
    }
    public function chat($name)
    {
        $id = Auth::guard('web')->user()->id;
        $room_dev = DataRoom::where('project_name', $name)->orWhere('sender_id' , $id)->orderBy('id', 'asc')->get();
       foreach($room_dev as $key => $value)
        {
            $room_dev[$key]['room_developer'] = $value->created_at->diffForHumans();
        }
        $user = DataRoom::where('project_name', $name)->orWhere('sender_id' , $id)->orWhere('receiver_id', $id)->get();
        return view('user.transactions.chatt', compact('room_dev','user'));
    }
    public function companyProfilee($id)
    {
        $Company = Company::where('user_id', $id)->get();
        $user = User::where('id', $id)->get();
        return view('admin.auth.ViewProfile', compact('Company', 'user'));
    }
    public function individualProfilee($id)
    {
        $individual = Profile::where('user_id', $id)->get();
        return view('admin.auth.ViewIndiviProfile', compact('individual'));
    }
    public function profileimage()
    {
        return view('user.auth.image');
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
        $user = Auth::guard('web')->user()->id;
        $platform = platform::where('user_id', $user)->get();
        return view('user.platform.table', compact('platform'));
    }
    public function addplatforms()
    {
        return view('user.platform.form');
    }

    public function projects()
    {
        $id = Auth::guard('web')->user()->id;
        $project = ProjectOverview::where('user_id', $id)->get();
        return view('user.projects.table', compact('project'));
    }
    public function investments()
    {
        $id = Auth::guard('web')->user()->id;
        $project = RequestProject::where('user_id', $id)->where('request_status_admin', '1')->get();
        return view('user.invest.table', compact('project'));
    }
    public function transactions()
    {
        $id = Auth::guard('web')->user()->id;
        $room = DataRoom::where('sender_id', $id)->orWhere('receiver_id', $id)->get();
        return view('user.transactions.table', compact('room'));
    }
    public function email()
    {
        return view('user.auth.email');
    }
    public function choose()
    {
        return view('user.auth.select');
    }
    public function ediprofileIndivi()
    {
        $id = Auth::guard('web')->user()->id;
        $user = Profile::where('user_id', $id)->get();
        return view('user.auth.updateProfileindividual', compact('user'));
    }
    public function ediprofileCompany()
    {
        $id = Auth::guard('web')->user()->id;
        $user = Company::where('user_id', $id)->get();
        return view('user.auth.updateProfilecompany', compact('user'));
    }

    public function individual()
    {
        return view('user.auth.individual');
    }
    public function mycompany()
    {
        $user = Auth::guard('web')->user()->id;
        $employeess = DB::table('employees')->where('userid', $user)->count();
        $projects = DB::table('project_overviews')->where('user_id', $user)->count();
        $employees = Employees::where('userid', $user)->get();
        return view('user.auth.mycompany', compact('employees', 'employeess', 'projects'));
    }
    public function company()
    {
        return view('user.auth.company');
    }
    public function opportunities()
    {
        $projects = ProjectOverview::get();
        return view('user.opportunities.table', compact('projects'));
    }
    public function management()
    {
        $user_id = Auth::guard('web')->user()->id;
        $projects = RequestProject::where('project_user_id', $user_id)->orWhere('user_id', $user_id)->get();
        return view('user.management.table', compact('projects'));
    }
    public function profile()
    {
        $user = Auth::guard('web')->user()->id;
        $individual = Profile::where('user_id', $user)->get();
        $individuals = Profile::where('user_id', $user)->get();
        $Company = Company::where('user_id', $user)->get();
        $Companys = Company::where('user_id', $user)->get();
        return view('user.auth.profile', compact('individual', 'individuals', 'Company', 'Companys'));
    }
    public function myplatforms($user_id)
    {
        $platform = platform::where('id', $user_id)->get();
        return view('user.platform.all', compact('platform'));
    }
    public function myprojects($user_id)
    {
        $platform = ProjectOverview::where('ProjectName', $user_id)->get();
        $teaser = ProjectTeaser::where('ProjectName', $user_id)->get();
        $sites = ProjectSite::where('ProjectName', $user_id)->get();
        $Maintenance = ProjectOperations::where('ProjectName', $user_id)->get();
        $Contracts = ProjectContracts::where('ProjectName', $user_id)->get();
        $Taxes = ProjectTaxes::where('ProjectName', $user_id)->get();
        $Shareholders = ProjectShareholders::where('ProjectName', $user_id)->get();
        return view('user.projects.all', compact('platform', 'teaser', 'sites', 'Maintenance', 'Contracts', 'Taxes', 'Shareholders'));
    }
    public function storeimage(Request $request)
    {
        $request->validate([
            'Image' => 'mimes:jpeg,jpg,png,gif|required|max:3072',
        ]);
        $user = Auth::guard('web')->user()->id;
        $image = User::find($user);
        if ($request->hasfile('Image')) {
            $imageName = time() . '.' . $request->Image->extension();
            $image->Image = $imageName;
            $request->Image->move(public_path('images'), $imageName);
        }
        $image->save();
        return redirect()->back()->with('message', 'Image Uploaded Successfully!');
    }
    public function reset_form(Request $request)
    {
        $token = $request->segment(3);
        $email = $request->email;
        return view('user.auth.reset', compact('token', 'email'));
    }
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|max:6',
        ]);
        $id = Auth::guard('web')->user()->id;
        $user = Auth::guard('web')->user()->otp == $request->otp;
        if ($user == true) {
            $user = User::find($id);
            $user->v_otp = '1';
            $user->otp = NULL;
            $user->save();
            return redirect('/user/choose-role')->with('message', 'Email Verified Successfully!');
        } else {
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
            'termsConditions' => 'required',
        ]);
        $email = $request->email;
        $otp = mt_rand(100000, 999999);
        $user = new User();
        $user->name = $request->name;
        $user->email = $email;
        $user->termsConditions = $request->termsConditions;
        $user->LoginWith = 'Email';
        $user->password = Hash::make($request->password);

        $user->otp = $otp;
        $user->save();

        Mail::send('emails.verifyemail', ['otp' => $otp], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Verify Email');
        });
        if ($this->saveProfile($email)) {
            return redirect()->back()->with('message', trans('Account Created Successfully!'));
        }
    }
    public function saveProfile($email)
    {
        $Company = new Company();
        $Company->email = $email;
        $Company->save();
        if ($this->saveemail($email)) {
            return redirect('/user/register')->with('message', trans('Account Created Successfully!'));
        }
    }
    public function saveemail($email)
    {
        $Company = new Profile();
        $Company->email = $email;
        $Company->save();
        return redirect('/user/register')->with('message', trans('Account Created Successfully!'));
    }
    public function resend(Request $request)
    {
        $otp = mt_rand(100000, 999999);
        $email = Auth::guard('web')->user()->email;
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
            'email' => 'required|max:250',
            'password' => 'required|max:250',

        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/');
        }
        return redirect()->back()->with('error', 'Email or Password is Invalid!');
    }
    public function changePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'min:6|different:password',
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
                return redirect('/user/change-password')->with('message', 'Password Changed Successfully');
            } else {
                $request->session()->flash('error', 'Old Password does not match');
                return redirect('/user/change-password');
            }
        }
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
            return redirect()->back()->with('success', trans('A reset link has been sent to your email address.'));
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
        if (!$tokenData) return view('user.auth.changePassword');
        $user = User::where('email', $tokenData->email)->first();
        if (!$user) return redirect()->back()->withErrors(['email1' => 'Email not found']);
        $user->password = Hash::make($password);
        $user->update();
        DB::table('password_resets')->where('email', $user->email)
            ->delete();
        if ($user) {
            return redirect('/user/login')->with('message', 'Password Changed Successfully!');
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }
    }
}
