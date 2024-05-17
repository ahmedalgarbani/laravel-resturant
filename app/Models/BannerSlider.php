<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerSlider extends Model
{
    use HasFactory;
    protected $fillable=[
        'image','title','sub_title','status'
    ];
}
