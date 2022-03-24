<?php

namespace App\Http\Controllers;

use App\Models\ProjectDebt;
use App\Models\ProjectOverview;
use Illuminate\Http\Request;

class ProjectDebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adddebt()
    {
        $projects = ProjectOverview::get();
        $projectsid = ProjectOverview::get();
        return view('user.projects.debt', compact('projects', 'projectsid'));
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
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectDebt  $projectDebt
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectDebt $projectDebt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectDebt  $projectDebt
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ProjectName' => 'required|max:250|unique:project_debts',
            'ShareOfProject' => 'required|max:250',
            'FixedRate' => 'required|max:250',
            'RepaymentSchedule' => 'required|max:250',
            'LenderName' => 'required|max:250',
            'DebtType' => 'required|max:250',
            'MinimumDSCR' => 'required|max:250',
            'LoanTerm' => 'required|max:250',
            'DebtDescription' => 'required|max:250',
            'StructureComments' => 'required|max:250',
            'Currency' => 'required|max:250',
            'InterestRate' => 'required|max:250',
            'Amount' => 'required|max:250',
            'Comments' => 'required|max:250',
            'PrincipalCurrency' => 'required|max:250',
            'PrincipalAmount' => 'required|max:250',
        ]);
        $contracts = new ProjectDebt();
        $contracts->ProjectId = $request->ProjectId;
        $contracts->ProjectName = $request->ProjectName;
        $contracts->ShareOfProject = $request->ShareOfProject;
        $contracts->RepaymentSchedule = $request->RepaymentSchedule;
        $contracts->FixedRate = $request->FixedRate;
        $contracts->LenderName = $request->LenderName;
        $contracts->DebtType = $request->DebtType;
        $contracts->MinimumDSCR = $request->MinimumDSCR;
        $contracts->LoanTerm = $request->LoanTerm;
        $contracts->DebtDescription = $request->DebtDescription;
        $contracts->StructureComments = $request->StructureComments;
        $contracts->Currency = $request->Currency;
        $contracts->InterestRate = $request->InterestRate;
        $contracts->Amount = $request->Amount;
        $contracts->Comments = $request->Comments;
        $contracts->PrincipalCurrency = $request->PrincipalCurrency;
        $contracts->PrincipalAmount = $request->PrincipalAmount;
        $contracts->save();
        return redirect()->back()->with('message','Debt Added Successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectDebt  $projectDebt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectDebt $projectDebt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectDebt  $projectDebt
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectDebt $projectDebt)
    {
        //
    }
}
