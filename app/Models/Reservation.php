<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservation';
    protected $fillable = [
        'reservation_type',
        'room_id',
        'room_type',
        'room_number',
        'first_name',
        'middle_name',            
        'last_name',
        'address',
        'contact',
        'email',
        'passport_no',
        'Country',
        'request_type',
        'special_request_rate',
        'room_plan',
        'room_plan_rate',
        'payment_mode',
        'total_rate',
        'arrival_date',
        'arrival_time',
        'departure_date',
        'departure_time'
    ];
}
