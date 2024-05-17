<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppDownload extends Model
{
    use HasFactory;
    protected $fillable=[
        'image','background','short_description','title','play_store_link','apple_store_link'
    ];
}
