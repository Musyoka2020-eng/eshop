<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'chats';
    protected $fillable = [
        'nickname',
        'userid',
        'alert_when',
        'block',
        'sms',
        'uploads',
    ];

    public function user()
    {
      return $this->belongsTo(User::class, 'userid', 'id');
    }
}
