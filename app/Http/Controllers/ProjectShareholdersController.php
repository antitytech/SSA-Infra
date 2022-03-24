<?php

namespace App\Http\Controllers;

use App\Models\ProjectShareholders;
use App\Models\ProjectOverview;
use Illuminate\Http\Request;

class ProjectShareholdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addshareholders()
    {
        $projects = ProjectOverview::get();
        $projectsid = ProjectOverview::get();
        return view('user.projects.share', compact('projects', 'projectsid'));
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
            'ProjectName' => 'required|max:250|unique:project_shareholders',
            'ShareholderFullName' => 'required|max:250',
            'ShareholdersComments' => 'required|max:250',
            'Shareholding' => 'required|max:250',
            'UltimateBeneficiaryName' => 'required|max:250',
        ]);
        $share = new ProjectShareholders();
        $share->ProjectId = $request->ProjectId;
        $share->ProjectName = $request->ProjectName;
        $share->ShareholderFullName = $request->ShareholderFullName;
        $share->ShareholdersComments = $request->ShareholdersComments;
        $share->Shareholding = $request->Shareholding;
        $share->UltimateBeneficiaryName = $request->UltimateBeneficiaryName;
        $share->save();
        return redirect()->back()->with('message','Equity Shareholders Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectShareholders  $projectShareholders
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectShareholders $projectShareholders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectShareholders  $projectShareholders
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectShareholders $projectShareholders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectShareholders  $projectShareholders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectShareholders $projectShareholders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectShareholders  $projectShareholders
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectShareholders $projectShareholders)
    {
        //
    }
}
