<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedType extends Model
{
    use HasFactory;
    protected $table = 'bedtype';
    protected $fillable = [
        'bed_type'
    ];
}