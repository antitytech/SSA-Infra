<?php

namespace App\Http\Controllers;

use App\Models\ProjectOperations;
use App\Models\ProjectOverview;
use Illuminate\Http\Request;

class ProjectOperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addmaintenance()
    {
        $projects = ProjectOverview::get();
        $projectsid = ProjectOverview::get();
        return view('user.projects.operation', compact('projects', 'projectsid'));

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
            'ProjectName' => 'required|max:250|unique:project_operations',
            'MaintenanceYearlyCosts' => 'required|max:250',
            'OverheadYearlyCosts' => 'required|max:250',
            'OM_ContractInPlace' => 'required|max:250',
            'OM_YearlyCosts' => 'required|max:250',
            'OM_Currency' => 'required|max:250',
            'OM_Contractor' => 'required|max:250',
            'CommentsOMCosts' => 'required|max:250',
            'OperationalRisks' => 'required|max:250',
            'ThirdParty' => 'required|max:250',
            'Yield_PerformancesRisks' => 'required|max:250',
            'InsuranceCosts' => 'required|max:250',
            'InsuranceCurrency' => 'required|max:250',
            'CommentsAboutInsuranceCosts' => 'required|max:250',
            'OM_EscalationRate' => 'required|max:250',
            'WarrantyEndDate' => 'required|max:250',
            'InsurerName' => 'required|max:250',
            'CommentsRegardingOM_Insurance' => 'required|max:250',
            'ItemsNotWarranty' => 'required|max:250',
        ]);
        $operation = new ProjectOperations();
        $operation->ProjectId = $request->ProjectId;
        $operation->ProjectName = $request->ProjectName;
        $operation->MaintenanceYearlyCosts = $request->MaintenanceYearlyCosts;
        $operation->OverheadYearlyCosts = $request->OverheadYearlyCosts;
        $operation->OM_ContractInPlace = $request->OM_ContractInPlace;
        $operation->OM_YearlyCosts = $request->OM_YearlyCosts;
        $operation->OM_Currency = $request->OM_Currency;
        $operation->OM_Contractor = $request->OM_Contractor;
        $operation->CommentsOMCosts = $request->CommentsOMCosts;
        $operation->OperationalRisks = $request->OperationalRisks;
        $operation->ThirdParty = $request->ThirdParty;
        $operation->Yield_PerformancesRisks = $request->Yield_PerformancesRisks;
        $operation->InsuranceCosts = $request->InsuranceCosts;
        $operation->InsuranceCurrency = $request->InsuranceCurrency;
        $operation->CommentsAboutInsuranceCosts = $request->CommentsAboutInsuranceCosts;
        $operation->OM_EscalationRate = $request->OM_EscalationRate;
        $operation->InsurerName = $request->InsurerName;
        $operation->CommentsRegardingOM_Insurance = $request->CommentsRegardingOM_Insurance;
        $operation->WarrantyEndDate = $request->WarrantyEndDate;
        $operation->ItemsNotWarranty = $request->ItemsNotWarranty;
        $operation->save();
        return redirect()->back()->with('message','Operation Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectOperations  $projectOperations
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectOperations $projectOperations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectOperations  $projectOperations
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectOperations $projectOperations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectOperations  $projectOperations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectOperations $projectOperations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectOperations  $projectOperations
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectOperations $projectOperations)
    {
        //
    }
}
