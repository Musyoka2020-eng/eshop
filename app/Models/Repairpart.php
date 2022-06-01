<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repairpart extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'repairparts';
    protected $fillable = [
        'part_name',
        'cost',
        'qty',
        'decription',
        'status',
    ];
}
