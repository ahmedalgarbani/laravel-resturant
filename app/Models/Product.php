<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];



    function category(){
        return $this->belongsTo(Category::class);
    }
    function productimage(){
        return $this->hasMany(ProductGallary::class);
    }
    function size(){
        return $this->hasMany(ProductSize::class);
    }
    function option(){
        return $this->hasMany(ProductOption::class);
    }

}
