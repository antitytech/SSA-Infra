<?php

namespace App\Http\Controllers;

use App\Models\ProjectFinancial;
use App\Models\ProjectOverview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectFinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addfinancial()
    {
        $projects = ProjectOverview::get();
        $projectsid = ProjectOverview::get();
        return view('user.projects.financials', compact('projects', 'projectsid'));
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
            'ProjectName' => 'required|max:250|unique:project_financials',
            'TotalProjectCost' => 'required|max:250',
            'TotalProjectCurrency' => 'required|max:250',
            'ProjectCostSpentDate' => 'required|max:250',
            'ProjectCurrencySpentDate' => 'required|max:250',
            'ProjectIRRlifecycle' => 'required|max:250',
            'ProjectIRRDate' => 'required|max:250',
            'IRRProductionAssumption' => 'required|max:250',
            'AverageRevenuesMonth' => 'required|max:250',
            'AverageRevenuesMonthCurrency' => 'required|max:250',
            'TypeDepreciation' => 'required|max:250',
            'DepreciationTerm' => 'required|max:250',
            'RemainingValue' => 'required|max:250',
            'RemainingValueCurrency' => 'required|max:250',
            'Comments' => 'required|max:250',
        ]);
        $financials = new ProjectFinancial();
        $financials->ProjectId = $request->ProjectId;
        $financials->ProjectName = $request->ProjectName;
        $financials->TotalProjectCost = $request->TotalProjectCost;
        $financials->TotalProjectCurrency = $request->TotalProjectCurrency;
        $financials->ProjectCostSpentDate = $request->ProjectCostSpentDate;
        $financials->ProjectCurrencySpentDate = $request->ProjectCurrencySpentDate;
        $financials->ProjectIRRlifecycle = $request->ProjectIRRlifecycle;
        $financials->ProjectIRRDate = $request->ProjectIRRDate;
        $financials->IRRProductionAssumption = $request->IRRProductionAssumption;
        $financials->AverageRevenuesMonth = $request->AverageRevenuesMonth;
        $financials->AverageRevenuesMonthCurrency = $request->AverageRevenuesMonthCurrency;
        $financials->TypeDepreciation = $request->TypeDepreciation;
        $financials->DepreciationTerm = $request->DepreciationTerm;
        $financials->RemainingValue = $request->RemainingValue;
        $financials->RemainingValueCurrency = $request->RemainingValueCurrency;
        $financials->Comments = $request->Comments;
        $financials->save();
        return redirect()->back()->with('message','Financials Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectFinancial  $projectFinancial
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFinancial $projectFinancial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFinancial  $projectFinancial
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFinancial $projectFinancial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectFinancial  $projectFinancial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectFinancial $projectFinancial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFinancial  $projectFinancial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFinancial $projectFinancial)
    {
        //
    }
}
