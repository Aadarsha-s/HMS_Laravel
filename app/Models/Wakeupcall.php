<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wakeupcall extends Model
{
    use HasFactory;
    protected $table = 'wakeupcall';
    protected $fillable = [
        'room_number',
        'date',
        'time',
        'remark',
        'guest'
    ];
}
