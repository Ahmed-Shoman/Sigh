<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'description',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
