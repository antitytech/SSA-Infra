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
            'Phone' => 'required',
            'Title' => 'required',
            'DOB' => 'required',
            'TaxResidence' => 'required',
            'CountryResidence' => 'required',
            'PrimaryCitizenship' => 'required',
            'MAILINGADDRESS' => 'required',
            'Addressline1' => 'required',
            'Addressline2' => 'required',
            'City' => 'required',
            'Zip' => 'required',
            'State' => 'required',
            'Country' => 'required',
            'ROLES' => 'required',
        ]);
        $email =  Auth::guard('web')->user()->email;
        $user = User::where('email', $email)->first();
        if ($request->hasfile('Passport')) {
            $imageName = time() . '.' . $request->Passport->extension();
            $user->Passport = $imageName;
            $request->Passport->move(public_path('images'), $imageName);
        }
        $user->name = $request->name;
        $user->profile = '1';
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

        // Mail::send('emails.verifyemail', [ 'otp' => $otp], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Verify Email');
        // });

        return redirect()->back()->with('message', 'Your Account is Under Review!');
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
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
