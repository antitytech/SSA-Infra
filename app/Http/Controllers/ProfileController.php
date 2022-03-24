<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:35',
            'Phone' => 'required|max:250',
            'Title' => 'required|max:250',
            'DOB' => 'required|max:250',
            'TaxResidence' => 'required|max:250',
            'CountryResidence' => 'required|max:250',
            'PrimaryCitizenship' => 'required|max:250',
            'MAILINGADDRESS' => 'required|max:250',
            'Addressline1' => 'required|max:250',
            'Addressline2' => 'required|max:250',
            'City' => 'required|max:250',
            'Zip' => 'required|max:250',
            'State' => 'required|max:250',
            'Country' => 'required|max:250',
            'ROLES' => 'required|max:250',
            'Passport' => 'mimes:jpeg,jpg,png,gif|required|max:3072',

        ]);
        $email =  Auth::guard('web')->user()->email;
        $user = Profile::where('email', $email)->first();
        if ($request->hasfile('Passport')) {
            $imageName = time() . '.' . $request->Passport->extension();
            $user->Passport = $imageName;
            $request->Passport->move(public_path('images'), $imageName);
        }
        $user->name = $request->name;
        $user->user_id = Auth::guard('web')->user()->id;
        $user->role = 'Individual';
        $user->email = $request->email;
        $user->Phone = $request->Phone;
        $user->Title = $request->Title;
        $user->DOB = $request->DOB;
        $user->TaxResidence = $request->TaxResidence;
        $user->CountryResidence = $request->CountryResidence;
        $user->PrimaryCitizenship = $request->PrimaryCitizenship;
        $user->MAILINGADDRESS = $request->MAILINGADDRESS;
        $user->Addressline1 = $request->Addressline1;
        $user->Addressline2 = $request->Addressline2;
        $user->City = $request->City;
        $user->Zip = $request->Zip;
        $user->State = $request->State;
        $user->Country = $request->Country;
        $user->ROLES = $request->ROLES;
        $user->save();

        if ( $this->saveProfile()) {
            return redirect('/user/profile')->with('error', 'Your Account is Under Review!');
        }
    }
    public function saveProfile()
    {
        $update_id = Auth::guard('web')->user()->id;
        if (isset($update_id) && $update_id > 0) {
            $user = User::find($update_id);
            $user->profile = 1;
            $user->role = 'Individual';
            $user->save();
            return redirect('/user/profile')->with('error', 'Your Account is Under Review!');
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function updateIndividual(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|max:35',
        //     'Phone' => 'required|max:250',
        //     'Title' => 'required|max:250',
        //     'DOB' => 'required|max:250',
        //     'TaxResidence' => 'required|max:250',
        //     'CountryResidence' => 'required|max:250',
        //     'PrimaryCitizenship' => 'required|max:250',
        //     'MAILINGADDRESS' => 'required|max:250',
        //     'Addressline1' => 'required|max:250',
        //     'Addressline2' => 'required|max:250',
        //     'City' => 'required|max:250',
        //     'Zip' => 'required|max:250',
        //     'State' => 'required|max:250',
        //     'Country' => 'required|max:250',
        //     'ROLES' => 'required|max:250',
        //     'Passport' => 'mimes:jpeg,jpg,png,gif|required|max:3072',

        // ]);
        $id = $request->id;
        $user = Profile::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->Phone = $request->Phone;
        $user->Title = $request->Title;
        $user->DOB = $request->DOB;
        $user->TaxResidence = $request->TaxResidence;
        $user->CountryResidence = $request->CountryResidence;
        $user->PrimaryCitizenship = $request->PrimaryCitizenship;
        $user->MAILINGADDRESS = $request->MAILINGADDRESS;
        $user->Addressline1 = $request->Addressline1;
        $user->Addressline2 = $request->Addressline2;
        $user->City = $request->City;
        $user->Zip = $request->Zip;
        $user->State = $request->State;
        $user->Country = $request->Country;
        $user->ROLES = $request->ROLES;
        $user->save();
        return redirect()->back()->with('message', 'Profile Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
