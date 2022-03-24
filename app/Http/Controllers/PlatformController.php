<?php

namespace App\Http\Controllers;

use App\Models\platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlatformController extends Controller
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
            'Name' => 'required|max:35',
            'Type' => 'required|max:250',
            'Capacity' => 'required|max:250',
            'projectLevel' => 'required|max:250',
            'Country' => 'required|max:250',
            'Status' => 'required|max:250',
            'RevenueType' => 'required|max:250',
            'RevenueCurrency' => 'required|max:250',
            'OpportunityBrief' => 'required|max:250',
            'MarketLandscape' => 'required|max:250',
            'ReasonInvest' => 'required|max:250',
            'AboutSponsor' => 'required|max:250',
            'PlatformInvestment' => 'required|max:250',
            'Image' => 'mimes:jpeg,jpg,png,gif|required|max:3072',

        ]);
        $platform = new platform();

        if ($request->hasfile('Image')) {
            $imageName = time() . '.' . $request->Image->extension();
            $platform->Image = $imageName;
            $request->Image->move(public_path('images'), $imageName);
        }

        $platform->user_id = Auth::guard('web')->user()->id;
        $platform->Name = $request->Name;
        $platform->Type = $request->Type;
        $platform->Capacity = $request->Capacity;
        $platform->projectLevel = $request->projectLevel;
        $platform->Country = $request->Country;
        $platform->Status = $request->Status;
        $platform->RevenueType = $request->RevenueType;
        $platform->RevenueCurrency = $request->RevenueCurrency;
        $platform->OpportunityBrief = $request->OpportunityBrief;
        $platform->MarketLandscape = $request->MarketLandscape;
        $platform->ReasonInvest = $request->ReasonInvest;
        $platform->AboutSponsor = $request->AboutSponsor;
        $platform->PlatformInvestment = $request->PlatformInvestment;
        $platform->save();
        return redirect()->back()->with('message' , 'New Platform Added Successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function show(platform $platform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function edit(platform $platform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, platform $platform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function destroy(platform $platform)
    {
        //
    }
}
