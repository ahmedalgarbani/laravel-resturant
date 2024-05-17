<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id','product_name','product_id','unit_price','product_size','product_option','qty'
    ];
}
