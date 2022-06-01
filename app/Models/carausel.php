<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carausel extends Model
{
    use HasFactory;
    protected $table = 'carausels';
    protected $fillable = [
        'image',
        'caption',
        'name',
    ];
}
