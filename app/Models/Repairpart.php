<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repairpart extends Model
{
    use HasFactory;
    protected $table = 'repairparts';
    protected $fillable = [
        'part_name',
        'cost',
        'qty',
        'decription',
        'status',
    ];
}
