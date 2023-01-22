<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSource extends Model
{
    use HasFactory;
    protected $table = 'business_source';
    protected $fillable = [
        'source',
        'apply_commission'
    ];
}
