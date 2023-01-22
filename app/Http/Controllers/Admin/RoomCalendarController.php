<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Models\Room;
use App\Models\Reservation;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\RoomRequest;
use Symfony\Component\HttpFoundation\Response;

class RoomCalendarController extends Controller
{
    public function index(){
     return view('admin.room_calendar.view');   
    }

    public function show($id){       
        for ($m=1; $m<=12; $m++) {
            if($id == $m){
                $res = Carbon::create(2022,$m)->daysInMonth;
                break;
            }
        }       
        $rooms = Room::all();
        $reservations = Reservation::all();
        $roomtypes = RoomType::all();
        //echo $reservations->arrival_date;
        return view('admin.room_calendar.show', compact('res','rooms','reservations','roomtypes'));
    } 
}
