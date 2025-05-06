<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    protected $fillable=[
         'image','description','price','tages','rate','name','is_special',
    ];
    protected $translatable = ['tages','name', 'description'];

    protected $cast=[
        'tages'=>'array',
        'price' => 'float',
        'is_special' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
 