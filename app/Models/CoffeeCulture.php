<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeCulture extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'description',
        'images',
        'title',
        'items',
        'cta_button_link',
    ];

    protected $casts = [
        'images' => 'array',
        'items' => 'array',
    ];
};
?>