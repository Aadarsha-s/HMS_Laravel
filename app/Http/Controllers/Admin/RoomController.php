<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\RoomRequest;
use Symfony\Component\HttpFoundation\Response;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.view')->with('rooms',$rooms);
    }

    public function show()
    {
        $rooms = Room::all();
        return view('admin.room_position.view')->with('rooms',$rooms);
    }
    
    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $room = new Room();
        $room->room_number = $request->input('room_number');
        $room->room_type = $request->input('room_type');
        $room->bed_type = $request->input('bed_type');
        $room->room_rate = $request->input('room_rate');
        $room->room_status = $request->input('room_status');
        $room->save();
        return redirect()->route('admin.rooms.index')->with([
                'message' => 'Successfully Created !',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $rooms = Room::find($id);
        return view('admin.rooms.edit', compact('rooms'));
    }

    public function update(Request $request,$id)
    {
        $rooms = Room::find($id);
        $rooms->room_number = $request->input('room_number');
        $rooms->room_type = $request->input('room_type');
        $rooms->bed_type = $request->input('bed_type');
        $rooms->room_rate = $request->input('room_rate');
        $rooms->room_status = $request->input('room_status');
        $rooms->update();
        
        return redirect()->route('admin.rooms.index')->with([
            'message' => 'Successfully Updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $rooms = Room::find($id);
        $rooms->delete();
        return redirect()->route('admin.rooms.index')->with([
            'message' => 'Successfully Deleted !',
            'alert-type' => 'danger'
        ]);
    }
    
    public function massDestroy(Request $request)
    {
        Room::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }
}
