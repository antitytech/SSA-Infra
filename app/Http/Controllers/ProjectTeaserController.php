<?php

namespace App\Http\Controllers;

use App\Models\ProjectOverview;
use App\Models\ProjectTeaser;
use Illuminate\Http\Request;

class ProjectTeaserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addteaser()
    {
        $projectsid = ProjectOverview::get();
        $projects = ProjectOverview::get();
        return view('user.projects.teaser', compact('projects', 'projectsid'));
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
            'ProjectId' => 'required|max:35',
            'OpportunityBrief' => 'required|max:250',
            'MarketLandscape' => 'required|max:250',
            'ReasonIinvest' => 'required|max:250',
            'AboutSponsor' => 'required|max:250',
            'TeaserOffTaker' => 'required|max:250',
            'ProjectName' => 'required|unique:project_teasers',
        ]);
        $teaser = new ProjectTeaser();
        $teaser->ProjectId = $request->ProjectId;
        $teaser->ProjectName = $request->ProjectName;
        $teaser->OpportunityBrief = $request->OpportunityBrief;
        $teaser->MarketLandscape = $request->MarketLandscape;
        $teaser->ReasonIinvest = $request->ReasonIinvest;
        $teaser->AboutSponsor = $request->AboutSponsor;
        $teaser->TeaserOffTaker = $request->TeaserOffTaker;
        $teaser->save();
        return redirect()->back()->with('message','Teaser Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectTeaser  $projectTeaser
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectTeaser $projectTeaser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectTeaser  $projectTeaser
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectTeaser $projectTeaser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectTeaser  $projectTeaser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectTeaser $projectTeaser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectTeaser  $projectTeaser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectTeaser $projectTeaser)
    {
        //
    }
}
