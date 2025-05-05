<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=[
        'image','title','slug','description','tags','status','publish_time'
    ];

    protected $casts = [
        'tags' => 'array',
    ];
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($blog) {
            if (!$blog->slug) {
                $slug = $blog->title;
                $slug = trim($slug);
                $slug = mb_strtolower($slug, "UTF-8");            
                $slug = str_replace(['/', '\\'], '-', $slug);
                $slug = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $slug);
                $slug = preg_replace("/[\s-]+/", " ", $slug);
                $slug = preg_replace("/[\s_]/", '-', $slug);
                $blog->slug = $slug;
            }
        });
    }
}
 