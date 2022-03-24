<?php

namespace App\Http\Controllers;

use App\Models\ProjectOverview;
use App\Models\RequestProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestproject(Request $request)
    {
        $email = Auth::guard('web')->user()->email;
        $overview = new RequestProject ();

        $overview->projectid = $request->projectid;
        $overview->name = Auth::guard('web')->user()->name;
        $overview->email = $email;
        $overview->project_user_id = $request->project_user_id;
        $overview->role = Auth::guard('web')->user()->role;
        $overview->ProjectName = $request->ProjectName;
        $overview->ProjectEmail = $request->ProjectEmail;
        $overview->request_user_id = $request->request_user_id;
        $overview->Image = $request->Image;
        $overview->ProjectType = $request->ProjectType;
        $overview->user_id = $request->user_id;
        $overview->Offtaker = $request->Offtaker;
        $overview->PPA_Status = $request->PPA_Status;
        $overview->ChoosePlatform = $request->ChoosePlatform;
        $overview->grid = $request->grid;
        $overview->City = $request->City;
        $overview->DateCommissioning = $request->DateCommissioning;
        $overview->Evacuation = $request->Evacuation;
        $overview->SiteIdentified = $request->SiteIdentified;
        $overview->ProjectStage = $request->ProjectStage;
        $overview->Country = $request->Country;
        $overview->Developer = $request->Developer;
        $overview->Region = $request->Region;
        $overview->EPC_Contractor = $request->EPC_Contractor;
        $overview->EPC_Structure = $request->EPC_Structure;
        $overview->Street = $request->Street;
        $overview->PostalCode = $request->PostalCode;
        $overview->OwnershipStructure = $request->OwnershipStructure;
        $overview->SpecialPurposeVehicle = $request->SpecialPurposeVehicle;
        $overview->save();

        return redirect()->back()->with('message', 'Request Sended Successfully!');
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
    public function status0inves(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = RequestProject::find($update_id);
            $userr->request_status_inves = 0;
            $userr->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        }
    }
    public function status1inves(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = RequestProject::find($update_id);
            $userr->request_status_inves = 1;
            $userr->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        }
    }
    public function status0dev(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = RequestProject::find($update_id);
            $userr->request_status_dev = 0;
            $userr->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        }
    }
    public function status1dev(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = RequestProject::find($update_id);
            $userr->request_status_dev = 1;
            $userr->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        }
    }
    public function statuss0(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = RequestProject::find($update_id);
            $userr->request_status_admin = 0;
            $userr->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        }
    }
    public function statuss1(Request $request)
    {
        $update_id = $request->id;
        if (isset($update_id) && $update_id > 0) {
            $userr = RequestProject::find($update_id);
            $userr->request_status_admin = 1;
            $userr->save();
            return redirect()->back()->with('message', 'Status Updated Successfully!');
        }
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
     * @param  \App\Models\RequestProject  $requestProject
     * @return \Illuminate\Http\Response
     */
    public function show(RequestProject $requestProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestProject  $requestProject
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestProject $requestProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestProject  $requestProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestProject $requestProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestProject  $requestProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestProject $requestProject)
    {
        //
    }
}
