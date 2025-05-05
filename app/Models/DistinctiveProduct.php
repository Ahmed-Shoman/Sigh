<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistinctiveProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'description',
        'products',
    ];

    protected $casts = [
        'products' => 'array',
    ];
};
?>
