<?php

namespace App\Http\Controllers;

use App\Models\DataRoom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_dataroom(Request $request)
    {
        $room = new DataRoom();
        $room->sender_id = $request->invester_id;
        $room->receiver_id = $request->developer_id;
        $room->project_name = $request->project_name;
        $room->message = 'Hello';
        $room->save();
        return redirect()->back()->with('message','Room Created Successfully!');
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
            'message' => 'required|max:255',
            'folder' => 'mimes:jpeg,jpg,png,gif,pdf|max:3072',
        ]);
        $id = Auth::guard('web')->user()->id;
        $room = new DataRoom();
        if ($request->hasfile('folder')) {
            $imageName = time() . '.' . $request->folder->extension();
            $room->folder = $imageName;
            $request->folder->move(public_path('files'), $imageName);
        }
        if(Auth::guard('web')->user()->id == $id)
        {
          $room->receiver_id = $request->sender_id;
          $room->sender_id = $id;
        }
        $room->project_name = $request->project_name;
        $room->message = $request->message;
        $room->save();
        return redirect()->back()->with('message','Room Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataRoom  $dataRoom
     * @return \Illuminate\Http\Response
     */
    public function show(DataRoom $dataRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataRoom  $dataRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(DataRoom $dataRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataRoom  $dataRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataRoom $dataRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataRoom  $dataRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataRoom $dataRoom)
    {
        //
    }
}
