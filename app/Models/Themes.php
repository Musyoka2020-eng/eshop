<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Themes extends Model
{
    use HasFactory;
    protected $table = 'themes';
    protected $fillable = [
        'name',
        'text_color',
        'back_color',
    ];
}