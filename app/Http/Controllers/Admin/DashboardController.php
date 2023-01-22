<?php

namespace App\Http\Controllers\Admin;

use App\Models\BusinessSource;
use App\Models\Founditem;
use App\Models\Frontoffice;
use App\Models\Lostcomplain;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use App\Models\Wakeupcall;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $b_count = BusinessSource::count();
        $founditem_count = Founditem::count();
        $frontoffice_count = Frontoffice::count();
        $lostcomplain_count = LostComplain::count();
        $reservation_count = Reservation::count();
        $room_count = Room::count();
        $user_count = User::count();
        $wakeupcall_count = Wakeupcall::count();
        return view('admin.dashboard', compact('b_count','founditem_count','frontoffice_count',
        'lostcomplain_count','reservation_count','room_count','user_count','wakeupcall_count' ));
    }
}
