<?php

namespace App\Http\Controllers;

use App\Models\ProjectContracts;
use App\Models\ProjectOverview;

use Illuminate\Http\Request;

class ProjectContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addcontracts()
    {
      
        $projects = ProjectOverview::get();
        $projectsid = ProjectOverview::get();
        return view('user.projects.contracts', compact('projects', 'projectsid'));
    
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
            'ProjectName' => 'required|max:250|unique:project_contracts',
            'BuildingPermitsAvailable' => 'required|max:250',
            'EnvironmentalPermitsAvailable' => 'required|max:250',
            'InterconnectionPermitsAvailable' => 'required|max:250',
            'GeneralRisks' => 'required|max:250',
            'TransitRisks' => 'required|max:250',
            'Construction_ErectionRisks' => 'required|max:250',
            'ThirdPartyLiability' => 'required|max:250',
            'ProfessionalIndemnity' => 'required|max:250',
            'InsuranceCosts' => 'required|max:250',
            'InsuranceCostsCurrency' => 'required|max:250',
            'CommentAboutInsurance' => 'required|max:250',
            'ProjectDeveloperEPC' => 'required|max:250',
            'EPC_Contract' => 'required|max:250',
            'ProcurementContractor' => 'required|max:250',
            'EngineeringContractor' => 'required|max:250',
            'ConstructionContractor' => 'required|max:250',
        ]);
        $contracts = new ProjectContracts();
        $contracts->ProjectId = $request->ProjectId;
        $contracts->ProjectName = $request->ProjectName;
        $contracts->BuildingPermitsAvailable = $request->BuildingPermitsAvailable;
        $contracts->EnvironmentalPermitsAvailable = $request->EnvironmentalPermitsAvailable;
        $contracts->InterconnectionPermitsAvailable = $request->InterconnectionPermitsAvailable;
        $contracts->GeneralRisks = $request->GeneralRisks;
        $contracts->TransitRisks = $request->TransitRisks;
        $contracts->Construction_ErectionRisks = $request->Construction_ErectionRisks;
        $contracts->ThirdPartyLiability = $request->ThirdPartyLiability;
        $contracts->ProfessionalIndemnity = $request->ProfessionalIndemnity;
        $contracts->InsuranceCosts = $request->InsuranceCosts;
        $contracts->InsuranceCostsCurrency = $request->InsuranceCostsCurrency;
        $contracts->CommentAboutInsurance = $request->CommentAboutInsurance;
        $contracts->ProjectDeveloperEPC = $request->ProjectDeveloperEPC;
        $contracts->EPC_Contract = $request->EPC_Contract;
        $contracts->ProcurementContractor = $request->ProcurementContractor;
        $contracts->EngineeringContractor = $request->EngineeringContractor;
        $contracts->ConstructionContractor = $request->ConstructionContractor;
        $contracts->save();
        return redirect()->back()->with('message','Operation Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectContracts  $projectContracts
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectContracts $projectContracts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectContracts  $projectContracts
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectContracts $projectContracts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectContracts  $projectContracts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectContracts $projectContracts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectContracts  $projectContracts
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectContracts $projectContracts)
    {
        //
    }
}
