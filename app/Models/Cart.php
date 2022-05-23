<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable =[
        'user_id',
        'prod_id',
        'prod_qty',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }

    // public function products():BelongsTo
    // {
    //     return $this->belongsTo(Product::class, 'prod_id', 'id');
    // }

    // public function orders()
    // {
    //     return $this->belongsTo(Order::class, 'prod_id', 'id');
    // }
}


