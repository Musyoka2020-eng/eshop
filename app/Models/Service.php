<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
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
