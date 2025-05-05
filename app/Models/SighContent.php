<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SighContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'description',
        'images',
        'sub_title',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
