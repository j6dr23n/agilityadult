<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Video extends Model implements Viewable
{
    use HasFactory,InteractsWithViews;

    protected $guarded = [];

    protected $casts = [
        'poster' => 'array',
    ];

    public static function boot()
    {
        parent::boot();

        // registering a callback to be executed upon the creation of an activity AR
        static::creating(function ($video) {

            // produce a slug based on the activity title
            $slug = Str::slug($video->title).'-'.now()->format('Y-m-d');

            // check to see if any other slugs exist that are the same & count them
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

            // if other slugs exist that are the same, append the count to the slug
            $video->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
}
