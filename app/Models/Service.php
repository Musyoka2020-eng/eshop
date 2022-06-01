<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'services';
    protected $fillable = [
        'serv_name',
        'serv_slug',
        'cost',
        'staff_id',
        'image',
        'status',
        'description',
    ];
}
