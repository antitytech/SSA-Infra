<?php

namespace App\Http\Controllers;

use App\Models\platform;
use App\Models\ProjectOverview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectOverviewController extends Controller
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
    public function addprojects()
    {
        $id = Auth::guard('web')->user()->id;
        $platform = platform::where('user_id', $id)->get();
        return view('user.projects.overview', compact('platform'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ProjectName' => 'required|max:35',
            'ProjectType' => 'required|max:250',
            'Offtaker' => 'required|max:250',
            'PPA_Status' => 'required|max:250',
            'ChoosePlatform' => 'required|max:250',
            'grid' => 'required|max:250',
            'DateCommissioning' => 'required|max:250',
            'Evacuation' => 'required|max:250',
            'SiteIdentified' => 'required|max:250',
            'ProjectStage' => 'required|max:250',
            'Country' => 'required|max:250',
            'Developer' => 'required|max:250',
            'Region' => 'required|max:250',
            'EPC_Contractor' => 'required|max:250',
            'EPC_Structure' => 'required|max:250',
            'Street' => 'required|max:250',
            'PostalCode' => 'required|max:250',
            'OwnershipStructure' => 'required|max:250',
            'SpecialPurposeVehicle' => 'required|max:250',
            'City' => 'required|max:250',
            'Image' => 'mimes:jpeg,jpg,png,gif|required|max:3072',

        ]);
        $email =  Auth::guard('web')->user()->email;
        $overview = new ProjectOverview();
        if ($request->hasfile('Image')) {
            $imageName = time() . '.' . $request->Image->extension();
            $overview->Image = $imageName;
            $request->Image->move(public_path('images'), $imageName);
        }
        $overview->ProjectName = $request->ProjectName;
        $overview->ProjectEmail = $email;
        $overview->ProjectType = $request->ProjectType;
        $overview->user_id = $request->user_id;
        $overview->Offtaker = $request->Offtaker;
        $overview->PPA_Status = $request->PPA_Status;
        $overview->ChoosePlatform = $request->ChoosePlatform;
        $overview->grid = $request->grid;
        $overview->City = $request->City;
        $overview->DateCommissioning = $request->DateCommissioning;
        $overview->Evacuation = $request->Evacuation;
        $overview->SiteIdentified = $request->SiteIdentified;
        $overview->ProjectStage = $request->ProjectStage;
        $overview->Country = $request->Country;
        $overview->Developer = $request->Developer;
        $overview->Region = $request->Region;
        $overview->EPC_Contractor = $request->EPC_Contractor;
        $overview->EPC_Structure = $request->EPC_Structure;
        $overview->Street = $request->Street;
        $overview->User_Name = Auth::guard('web')->user()->name;
        $overview->PostalCode = $request->PostalCode;
        $overview->OwnershipStructure = $request->OwnershipStructure;
        $overview->SpecialPurposeVehicle = $request->SpecialPurposeVehicle;
        $overview->save();
        return redirect()->back()->with('message','Overview Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectOverview  $projectOverview
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectOverview $projectOverview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectOverview  $projectOverview
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectOverview $projectOverview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectOverview  $projectOverview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectOverview $projectOverview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectOverview  $projectOverview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectOverview $projectOverview)
    {
        //
    }
}
