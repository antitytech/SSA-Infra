<?php

namespace App\Http\Controllers;

use App\Models\ProjectTaxes;
use App\Models\ProjectOverview;
use Illuminate\Http\Request;

class ProjectTaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addtaxes()
    {
        $projects = ProjectOverview::get();
        $projectsid = ProjectOverview::get();
        return view('user.projects.taxes', compact('projects', 'projectsid'));
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
            'ProjectName' => 'required|max:250|unique:project_taxes',
            'CorporateIncomeTax' => 'required|max:250',
            'ImportDutiesVAT' => 'required|max:250',
            'Schedule' => 'required|max:250',
            'WithholdingTax' => 'required|max:250',
            'OtherTax' => 'required|max:250',
            'DepreciationTerm' => 'required|max:250',
            'DepreciationTermYear' => 'required|max:250',
            'VAT_GST_Revenue' => 'required|max:250',
            'TaxesComments' => 'required|max:250',
            'VAT_GST_Expense' => 'required|max:250',
            'InitialAllowance' => 'required|max:250',
        ]);
        $taxes = new ProjectTaxes();
        $taxes->ProjectId = $request->ProjectId;
        $taxes->ProjectName = $request->ProjectName;
        $taxes->CorporateIncomeTax = $request->CorporateIncomeTax;
        $taxes->ImportDutiesVAT = $request->ImportDutiesVAT;
        $taxes->Schedule = $request->Schedule;
        $taxes->WithholdingTax = $request->WithholdingTax;
        $taxes->OtherTax = $request->OtherTax;
        $taxes->DepreciationTerm = $request->DepreciationTerm;
        $taxes->DepreciationTermYear = $request->DepreciationTermYear;
        $taxes->VAT_GST_Revenue = $request->VAT_GST_Revenue;
        $taxes->TaxesComments = $request->TaxesComments;
        $taxes->VAT_GST_Expense = $request->VAT_GST_Expense;
        $taxes->InitialAllowance = $request->InitialAllowance;
        $taxes->save();
        return redirect()->back()->with('message','Taxes Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectTaxes  $projectTaxes
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectTaxes $projectTaxes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectTaxes  $projectTaxes
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectTaxes $projectTaxes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectTaxes  $projectTaxes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectTaxes $projectTaxes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectTaxes  $projectTaxes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectTaxes $projectTaxes)
    {
        //
    }
}
