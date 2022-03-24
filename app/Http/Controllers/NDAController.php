<?php

namespace App\Http\Controllers;

use App\Models\NDA;
use App\Http\Controllers\Controller;
use App\Models\RequestProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NDAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ndadeveloper($id)
    {
        return view('user.auth.ndadev' , ['id' => $id]);
    }
       public function ndainvestor($id)
    {
        return view('user.auth.ndainves' , ['id' => $id]);
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
    public function developer(Request $request)
    {
        $request->validate([
            'nda_dev' =>  'mimes:pdf|required|max:3072',
        ]);
        $user =  Auth::guard('web')->user()->id;
        $projectid = $request->inves_user_id;
        $nda = new NDA();
        if ($request->hasfile('nda_dev')) {
            $imageName = time() . '.' . $request->nda_dev->extension();
            $nda->nda_dev = $imageName;
            $request->nda_dev->move(public_path('pdfs'), $imageName);
        }
        $nda->user_id = $user;
        $nda->inves_user_id = $projectid;
        $nda->save();
        if ($this->changeStatus($projectid)) {
            return redirect()->back()->with('message', trans('Account Created Successfully!'));
        }

    }
    public function changeStatus($projectid)
    {
        $update_id = $projectid;
        if (isset($update_id) && $update_id > 0) {
            $userr = RequestProject::find($update_id);
            $userr->nda_developer = 1;
            $userr->save();
            return redirect()->back()->with('messsage','NDA Submitted Successfully!');
        }
    }
    public function investor(Request $request)
    {
        $request->validate([
            'nda_inves' =>  'mimes:pdf|required|max:3072',
        ]);
        $user =  Auth::guard('web')->user()->id;
        $projectid = $request->inves_user_id;
        $nda = new NDA();
        if ($request->hasfile('nda_inves')) {
            $imageName = time() . '.' . $request->nda_inves->extension();
            $nda->nda_inves = $imageName;
            $request->nda_inves->move(public_path('pdfs'), $imageName);
        }
        $nda->user_id = $user;
        $nda->inves_user_id = $projectid;
        $nda->save();
        if ($this->changeStatuss($projectid)) {
            return redirect()->back()->with('message', trans('Account Created Successfully!'));
        }

    }
    public function changeStatuss($projectid)
    {
        $update_id = $projectid;
        if (isset($update_id) && $update_id > 0) {
            $userr = RequestProject::find($update_id);
            $userr->nda_investor = 1;
            $userr->save();
            return redirect()->back()->with('messsage','NDA Submitted Successfully!');
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NDA  $nDA
     * @return \Illuminate\Http\Response
     */
    public function show(NDA $nDA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NDA  $nDA
     * @return \Illuminate\Http\Response
     */
    public function edit(NDA $nDA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NDA  $nDA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NDA $nDA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NDA  $nDA
     * @return \Illuminate\Http\Response
     */
    public function destroy(NDA $nDA)
    {
        //
    }
}
