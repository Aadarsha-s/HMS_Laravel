<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReservationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function () {
    return view('auth.login');
});
//Route::get('/user/home',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::delete('permissions_mass_destroy', [\App\Http\Controllers\Admin\PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::delete('roles_mass_destroy', [\App\Http\Controllers\Admin\RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::delete('users_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('users.mass_destroy');
 
    Route::resource('rooms', \App\Http\Controllers\Admin\RoomController::class);
    Route::get('room_position', [\App\Http\Controllers\Admin\RoomController::class, 'show'])->name('room_position.show');
    Route::delete('rooms_mass_destroy', [\App\Http\Controllers\Admin\RoomController::class, 'massDestroy'])->name('rooms.mass_destroy');
    
    
    Route::resource('roomtype', \App\Http\Controllers\Admin\RoomTypeController::class);
    Route::delete('roomtype_mass_destroy', [\App\Http\Controllers\Admin\RoomTypeController::class, 'massDestroy'])->name('roomtype.mass_destroy');
    
    Route::resource('bedtype', \App\Http\Controllers\Admin\BedTypeController::class);
    Route::delete('bedtype_mass_destroy', [\App\Http\Controllers\Admin\BedTypeController::class, 'massDestroy'])->name('bedtype.mass_destroy');
    
    Route::resource('roomstatus', \App\Http\Controllers\Admin\RoomStatusController::class);
    Route::delete('roomstatus_mass_destroy', [\App\Http\Controllers\Admin\RoomStatusController::class, 'massDestroy'])->name('roomstatus.mass_destroy');
    

    Route::resource('front_office_order', \App\Http\Controllers\Admin\FrontOfficeController::class);
    Route::delete('front_mass_destroy', [\App\Http\Controllers\Admin\FrontOfficeController::class, 'massDestroy'])->name('front_office_order.mass_destroy');
    
    Route::resource('frontservice', \App\Http\Controllers\Admin\FrontServiceController::class);
    Route::delete('frontservice_mass_destroy', [\App\Http\Controllers\Admin\FrontServiceController::class, 'massDestroy'])->name('front_office_order.frontservice.mass_destroy');
    
    Route::resource('lostcomplain', \App\Http\Controllers\Admin\LostComplainController::class);
    Route::delete('lostcomplain', [\App\Http\Controllers\Admin\LostComplainController::class, 'massDestroy'])->name('lostcomplain.mass_destroy');
    
    Route::resource('founditems', \App\Http\Controllers\Admin\FoundItemsController::class);
    Route::delete('founditems', [\App\Http\Controllers\Admin\FoundItemsController::class, 'massDestroy'])->name('founditems.mass_destroy');
    
    Route::resource('wakeupcall', \App\Http\Controllers\Admin\WakeupCallController::class);
    Route::delete('wakeupcall', [\App\Http\Controllers\Admin\WakeupCallController::class, 'massDestroy'])->name('wakeupcall.mass_destroy');

    Route::resource('business_source', \App\Http\Controllers\Admin\BusinessSourceController::class);
    Route::delete('business_source', [\App\Http\Controllers\Admin\BusinessSourceController::class, 'massDestroy'])->name('business_source.mass_destroy');

    Route::resource('reservation', \App\Http\Controllers\Admin\ReservationController::class);
    Route::delete('reservation', [\App\Http\Controllers\Admin\ReservationController::class, 'massDestroy'])->name('reservation.mass_destroy');
    
    Route::resource('room_calendar', \App\Http\Controllers\Admin\RoomCalendarController::class);
    //Route::resource('room_calendar/show/{key}', [\App\Http\Controllers\Admin\RoomCalendarController::class, 'show'])->name('room_calendar.show');
    
    Route::get('system_calendars', [\App\Http\Controllers\Admin\SystemCalendarController::class, 'index'])->name('system_calendars.index');
});
Auth::routes();
