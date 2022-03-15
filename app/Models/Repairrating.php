<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repairrating extends Model
{
    use HasFactory;
    protected $table = 'repairratings';
    protected $fillable = [
        'user_id',
        'prod_id',
        'stars_rated',
        'user_review'
    ];

    
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function repairs()
    { 
      return $this->belongsTo(Repair::class);
    }
}
