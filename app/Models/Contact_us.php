<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact_us extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='contact_uses';
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
