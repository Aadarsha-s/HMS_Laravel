<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\RoomStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RoomStatusController extends Controller
{
    //
    public function index()
    {
        $roomstatus = RoomStatus::all();
        return view('admin.rooms.roomstatus.view')->with('roomstatus',$roomstatus);
    }

    public function create()
    {
        return view('admin.rooms.roomstatus.create');
    }

    public function store(Request $request)
    {
        $roomstatus = new RoomStatus();
        $roomstatus->room_status = $request->input('room_status');
        $roomstatus->save();
        return redirect()->route('admin.roomstatus.index')->with([
                'message' => 'Successfully Created !',
                'alert-type' => 'success'
            ]);
    }

    
    public function edit($id)
    {
        $roomstatus = RoomStatus::find($id);
        return view('admin.rooms.roomstatus.edit', compact('roomstatus'));
    }

    
    public function update(Request $request,$id)
    {
        $roomstatus = RoomStatus::find($id);
        $roomstatus->room_status = $request->input('room_status');
        $roomstatus->update();
        
        return redirect()->route('admin.roomstatus.index')->with([
            'message' => 'Successfully Updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $roomstatus = RoomStatus::find($id);
        $roomstatus->delete();
        return redirect()->route('admin.roomstatus.index')->with([
            'message' => 'Successfully Deleted !',
            'alert-type' => 'danger'
        ]);
    }
    
    public function massDestroy(Request $request)
    {
        RoomStatus::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }
}
