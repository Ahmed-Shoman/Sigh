<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_slider',
        'url_vido',
        'slider_title ',
        'sub_title',
        'title_image',
        'sub_title_image',
        'images',
    ];

    protected $cast=[
        'images'=>'array',
    ];
}
