<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ReservationController extends Controller
{
    //
    function __construct()
    {
         $this->middleware('permission:booking-list|booking-create|booking-edit|booking-show|booking-delete', ['only' => ['index','store']]);
         $this->middleware('permission:booking-create', ['only' => ['create','store']]);
         $this->middleware('permission:booking-edit', ['only' => ['show','edit','update']]);
         $this->middleware('permission:booking-show', ['only' => ['show']]);
         $this->middleware('permission:booking-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.view')->with('reservations',$reservations);
    }

    public function create()
    {
        $reservations = Room::all();
        $roomtypes = RoomType::all();
        return view('admin.reservation.create', compact('reservations' , 'roomtypes'));
    }

    public function show($id)
    {
        $reservations = Reservation::where('id', $id)->first();
        $rooms = Room::all();
        return view('admin.reservation.show', compact('reservations' , 'rooms'));
    }

    public function store(Request $request)
    {
        $reservations = new Reservation();
        $reservations->reservation_type = $request->input('reservation_type');
        $reservations->room_id = auth()->user()->id;
        $reservations->room_type = $request->input('room_type');
        $reservations->room_number = $request->input('room_number');
        $reservations->first_name = $request->input('first_name');
        $reservations->middle_name = $request->input('middle_name');
        $reservations->last_name = $request->input('last_name');
        $reservations->address = $request->input('address');
        $reservations->contact = $request->input('contact');
        $reservations->email = $request->input('email');
        $reservations->passport_no = $request->input('passport_no');
        $reservations->country = $request->input('country');
        $reservations->request_type = $request->input('request_type');
        $reservations->special_request_rate = $request->input('special_request_rate');
        $reservations->room_plan = $request->input('room_plan');
        $reservations->room_plan_rate = $request->input('room_plan_rate');
        $reservations->payment_mode = $request->input('payment_mode');
        $reservations->total_rate = $request->input('total_rate');
        $reservations->arrival_date = $request->input('arrival_date');
        $reservations->arrival_time = $request->input('arrival_time');
        $reservations->departure_date = $request->input('departure_date');
        $reservations->departure_time = $request->input('departure_time');
        $reservations->save();
        return redirect()->route('admin.reservation.index')->with([
                'message' => 'Successfully Created !',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $reservations = Reservation::where('id', $id)->first();
        $rooms = Room::all();
        $roomtypes = RoomType::all();
        return view('admin.reservation.edit', compact('reservations','rooms','roomtypes'));
    }
    
    public function update(Request $request,$id)
    {
        $reservations = Reservation::find($id);
        // $reservations->reservation_for = $request->input('reservation_for');
        $reservations->reservation_type = $request->input('reservation_type');
        $reservations->room_type = $request->input('room_type');
        $reservations->room_number = $request->input('room_number');
        $reservations->first_name = $request->input('first_name');
        $reservations->middle_name = $request->input('middle_name');
        $reservations->last_name = $request->input('last_name');
        $reservations->address = $request->input('address');
        $reservations->contact = $request->input('contact');
        $reservations->email = $request->input('email');
        $reservations->passport_no = $request->input('passport_no');
        $reservations->country = $request->input('country');
        $reservations->request_type = $request->input('request_type');
        $reservations->special_request_rate = $request->input('special_request_rate');
        $reservations->room_plan = $request->input('room_plan');
        $reservations->room_plan_rate = $request->input('room_plan_rate');
        $reservations->payment_mode = $request->input('payment_mode');
        $reservations->total_rate = $request->input('total_rate');
        $reservations->arrival_date = $request->input('arrival_date');
        $reservations->arrival_time = $request->input('arrival_time');
        $reservations->departure_date = $request->input('departure_date');
        $reservations->departure_time = $request->input('departure_time');
        $reservations->update();
        return redirect()->route('admin.reservation.index')->with([
            'message' => 'Successfully Updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy($id)
    {
        $reservations = Reservation::find($id);
        $reservations->delete();
        return redirect()->route('admin.reservation.index')->with([
            'message' => 'Successfully Deleted !',
            'alert-type' => 'danger'
        ]);
    }
    
    public function massDestroy(Request $request)
    {
        Reservation::whereIn('id', request('ids'))->delete();
        return response()->noContent();
    }
}
