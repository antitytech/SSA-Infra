<?php

namespace App\Http\Controllers;

use App\Models\ProjectEnvironmental;
use App\Models\ProjectOverview;
use Illuminate\Http\Request;

class ProjectEnvironmentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function environmental()
    {
  
        $projects = ProjectOverview::get();
        $projectsid = ProjectOverview::get();
        return view('user.projects.environmental', compact('projects', 'projectsid'));

    
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
            'ProjectName' => 'required|max:250|unique:project_environmentals',
            'Assessment' => 'required|max:250',
            'ManagementPlan' => 'required|max:250',
            'Consultant' => 'required|max:250',
        ]);
        $share = new ProjectEnvironmental();
        $share->ProjectId = $request->ProjectId;
        $share->ProjectName = $request->ProjectName;
        $share->Assessment = $request->Assessment;
        $share->ManagementPlan = $request->ManagementPlan;
        $share->Consultant = $request->Consultant;
        $share->save();
        return redirect()->back()->with('message','Equity Shareholders Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectEnvironmental  $projectEnvironmental
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectEnvironmental $projectEnvironmental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectEnvironmental  $projectEnvironmental
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectEnvironmental $projectEnvironmental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectEnvironmental  $projectEnvironmental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectEnvironmental $projectEnvironmental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectEnvironmental  $projectEnvironmental
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectEnvironmental $projectEnvironmental)
    {
        //
    }
}
