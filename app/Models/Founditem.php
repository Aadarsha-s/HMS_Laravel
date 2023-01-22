<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Founditem extends Model
{
    use HasFactory;
    protected $table = 'found_item';
    protected $fillable = [
        'item_name',
        'room_number',
        'found_date',
        'description',
        'found_by',
        'reported_to'
    ];
}
