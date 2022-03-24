<?php

namespace App\Http\Controllers;

use App\Models\ProjectOverview;
use App\Models\ProjectRevenue;
use Illuminate\Http\Request;

class ProjectRevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addrevenues()
    {
        $projects = ProjectOverview::get();
        $projectsid = ProjectOverview::get();
        return view('user.projects.revenue', compact('projects', 'projectsid'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectRevenue  $projectRevenue
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectRevenue $projectRevenue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectRevenue  $projectRevenue
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectRevenue $projectRevenue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectRevenue  $projectRevenue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectRevenue $projectRevenue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectRevenue  $projectRevenue
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectRevenue $projectRevenue)
    {
        //
    }
}
