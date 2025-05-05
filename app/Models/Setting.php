<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo', 'meta_title', 'meta_description', 'name_brand', 'mobile', 'whatsapp',
        'location', 'email', 'time_work', 'privacy', 'terms_and_condition',
        'price_delivery', 'price_fast_delivery',
    ];
    
    protected $casts = [
        'price_delivery' => 'float',
        'price_fast_delivery' => 'float',
    ];
    
}
