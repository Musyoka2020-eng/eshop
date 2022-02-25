<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = [
        'user_id',
        'prod_id',
        'stars_rated'
    ];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function product()
    {
      return $this->belongsTo(Product::class, 'prod_id', 'id');
    }
}
