<?php

namespace App\Http\Controllers;

use App\Models\ProjectOverview;
use App\Models\ProjectSite;
use Illuminate\Http\Request;

class ProjectSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addsite()
    {
        $projects = ProjectOverview::get();
        $projectsid = ProjectOverview::get();
        return view('user.projects.site', compact('projects', 'projectsid'));
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
            'ProjectName' => 'required|max:35|unique:project_sites',
            'SiteAccessibleTruck' => 'required|max:250',
            'logistics' => 'required|max:250',
            'SiteArea' => 'required|max:250',
            'SiteUnit' => 'required|max:250',
            'SiteMainUsage' => 'required|max:250',
            'ContractSigned' => 'required|max:250',
            'SiteOwnerPPAoff_taker' => 'required|max:250',
            'SiteOwnerPayment' => 'required|max:250',
            'SiteContractType' => 'required|max:250',
            'SiteCostPerYear' => 'required|max:250',
            'SiteCurrency' => 'required|max:250',
            'DurationLease' => 'required|max:250',
            'SiteAccess' => 'required|max:250',
            'Address' => 'required|max:250',
            'CommentsSite' => 'required|max:250',
            'RoadSurvey' => 'required|max:250',
        ]);
        $site = new ProjectSite();
        $site->ProjectId = $request->ProjectId;
        $site->ProjectName = $request->ProjectName;
        $site->SiteAccessibleTruck = $request->SiteAccessibleTruck;
        $site->logistics = $request->logistics;
        $site->SiteArea = $request->SiteArea;
        $site->SiteUnit = $request->SiteUnit;
        $site->SiteMainUsage = $request->SiteMainUsage;
        $site->ContractSigned = $request->ContractSigned;
        $site->SiteOwnerPPAoff_taker = $request->SiteOwnerPPAoff_taker;
        $site->SiteOwnerPayment = $request->SiteOwnerPayment;
        $site->SiteContractType = $request->SiteContractType;
        $site->SiteCostPerYear = $request->SiteCostPerYear;
        $site->SiteCurrency = $request->SiteCurrency;
        $site->DurationLease = $request->DurationLease;
        $site->SiteAccess = $request->SiteAccess;
        $site->Address = $request->Address;
        $site->RoadSurvey = $request->RoadSurvey;
        $site->CommentsSite = $request->CommentsSite;
        $site->save();
        return redirect()->back()->with('message', 'Site Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectSite  $projectSite
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectSite $projectSite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectSite  $projectSite
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectSite $projectSite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectSite  $projectSite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectSite $projectSite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectSite  $projectSite
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectSite $projectSite)
    {
        //
    }
}
