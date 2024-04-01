<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;
    protected $fillable=['product_id','name','price'];

    protected $table = 'product_variants';
}
