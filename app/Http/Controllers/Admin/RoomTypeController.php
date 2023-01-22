<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RoomTypeController extends Controller
{
    //
    public function index()
    {
        $roomtypes = RoomType::all();
        return view('admin.rooms.roomtype.view')->with('roomtypes',$roomtypes);
    }

    public function create()
    {
        return view('admin.rooms.roomtype.create');
    }

    public function store(Request $request)
    {
        $roomtypes = new RoomType();
        $roomtypes->room_type = $request->input('room_type');
        $roomtypes->save();
        return redirect()->route('admin.roomtype.index')->with([
                'message' => 'Successfully Created !',
                'alert-type' => 'success'
            ]);
    }

    
    public function edit($id)
    {
        $roomtypes = RoomType::find($id);
        return view('admin.rooms.roomtype.edit', compact('roomtypes'));
    }

    
    public function update(Request $request,$id)
    {
        $roomtypes = RoomType::find($id);
        $roomtypes->room_type = $request->input('room_type');
        $roomtypes->update();
        
        return redirect()->route('admin.roomtype.index')->with([
            'message' => 'Successfully Updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $roomtypes = RoomType::find($id);
        $roomtypes->delete();
        return redirect()->route('admin.roomtype.index')->with([
            'message' => 'Successfully Deleted !',
            'alert-type' => 'danger'
        ]);
    }
    
    public function massDestroy(Request $request)
    {
        RoomType::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }

}
