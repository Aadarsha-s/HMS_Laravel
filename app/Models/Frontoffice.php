<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontoffice extends Model
{
    use HasFactory;
    protected $table = 'front_offices';
    protected $fillable = [
        'room_number',
        'service',
        // 'quantity',
        // 'rate',
        'description'
    ];

}
