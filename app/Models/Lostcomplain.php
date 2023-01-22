<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lostcomplain extends Model
{
    use HasFactory;
    protected $table = 'lost_complain';
    protected $fillable = [
        'item_name',
        'room_number',
        'date',
        'description',
        'complain_received'
    ];
}
