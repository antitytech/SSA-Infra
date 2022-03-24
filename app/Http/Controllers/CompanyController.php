<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:35',
            'Phone' => 'required|max:250',
            'CompanyName' => 'required|max:250',
            'listed' => 'required|max:250',
            'RegistrationNumber' => 'required|max:250',
            'IncorporationCountry' => 'required|max:250',
            'PrincipleBusiness' => 'required|max:250',
            'CompanyEmail' => 'required|max:250',
            'CompanyWebsite' => 'required|max:250',
            'income' => 'required|max:250',
            'Investor' => 'required|max:250',
            'MailingAddress' => 'required|max:250',
            'Addressline1' => 'required|max:250',
            'City' => 'required|max:250',
            'Zip' => 'required|max:250',
            'State' => 'required|max:250',
            'Country' => 'required|max:250',
            'ROLES' => 'required|max:250',
            'Incorporation' => 'mimes:jpeg,jpg,png,gif|required|max:3072',
            'CompanyLogo' => 'mimes:jpeg,jpg,png,gif|required|max:3072',

        ]);
        $email =  Auth::guard('web')->user()->email;
        $user = Company::where('email', $email)->first();

        if ($request->hasfile('Incorporation')) {
            $imageName = time() . '.' . $request->Incorporation->extension();
            $user->Incorporation = $imageName;
            $request->Incorporation->move(public_path('images'), $imageName);
        }
        if ($request->hasfile('CompanyLogo')) {
            $imageName = time() . '.' . $request->CompanyLogo->extension();
            $user->CompanyLogo = $imageName;
            $request->CompanyLogo->move(public_path('images'), $imageName);
        }

        $user->name = $request->name;

        $user->role = 'Company';
        $user->user_id = Auth::guard('web')->user()->id;
        $user->email = $request->email;
        $user->Phone = $request->Phone;
        $user->CompanyName = $request->CompanyName;
        $user->listed = $request->listed;
        $user->RegistrationNumber = $request->RegistrationNumber;
        $user->IncorporationCountry = $request->IncorporationCountry;
        $user->PrincipleBusiness = $request->PrincipleBusiness;
        $user->CompanyEmail = $request->CompanyEmail;
        $user->CompanyWebsite = $request->CompanyWebsite;
        $user->income = $request->income;
        $user->Investor = $request->Investor;
        $user->MailingAddress = $request->MailingAddress;
        $user->Addressline1 = $request->Addressline1;
        $user->City = $request->City;
        $user->Zip = $request->Zip;
        $user->State = $request->State;
        $user->Country = $request->Country;
        $user->ROLES = $request->ROLES;
        $user->save();

        if ( $this->saveProfile()) {
            return redirect('/user/profile')->with('message', 'Your Account is Under Review!');
        }
    }
    public function saveProfile()
    {
        $update_id = Auth::guard('web')->user()->id;
        if (isset($update_id) && $update_id > 0) {
            $user = User::find($update_id);
            $user->profile = 1;
            $user->role = 'Company';
            $user->save();
            return redirect('/user/profile')->with('message', 'Your Account is Under Review!');
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function UpdateCompany(Request $request)
    {

        $id = $request->id;
        $user = Company::find($id);

        if ($request->hasfile('Incorporation')) {
            $imageName = time() . '.' . $request->Incorporation->extension();
            $user->Incorporation = $imageName;
            $request->Incorporation->move(public_path('images'), $imageName);
        }
        if ($request->hasfile('CompanyLogo')) {
            $imageName = time() . '.' . $request->CompanyLogo->extension();
            $user->CompanyLogo = $imageName;
            $request->CompanyLogo->move(public_path('images'), $imageName);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->Phone = $request->Phone;
        $user->CompanyName = $request->CompanyName;
        $user->listed = $request->listed;
        $user->RegistrationNumber = $request->RegistrationNumber;
        $user->IncorporationCountry = $request->IncorporationCountry;
        $user->PrincipleBusiness = $request->PrincipleBusiness;
        $user->CompanyEmail = $request->CompanyEmail;
        $user->CompanyWebsite = $request->CompanyWebsite;
        $user->income = $request->income;
        $user->Investor = $request->Investor;
        $user->MailingAddress = $request->MailingAddress;
        $user->Addressline1 = $request->Addressline1;
        $user->City = $request->City;
        $user->Zip = $request->Zip;
        $user->State = $request->State;
        $user->Country = $request->Country;
        $user->ROLES = $request->ROLES;
        $user->save();
        return redirect()->back()->with('message','Profile Updated Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
