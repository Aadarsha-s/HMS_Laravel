<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\RoomRequest;
use Symfony\Component\HttpFoundation\Response;

class RoomCalendarController extends Controller
{
    //
    public function index(){
        $rooms = Room::all();
        return view('admin.room_calendar.view')->with('rooms',$rooms);    
    }
  
}
