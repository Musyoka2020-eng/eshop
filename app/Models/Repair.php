<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repair extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'repairs';
    protected $fillable = [
        'prod_name',
        'user_id',
        'contact',
        'email',
        'type',
        'condition',
        'total-price',
        'description',
        'status',
        'image',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'type', 'id');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'email');
    // }
}
