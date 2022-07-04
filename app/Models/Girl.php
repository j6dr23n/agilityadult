<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Girl extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','link','images','info','status'];

    protected $casts = [
        'images' => 'array'
    ];

    public static function boot()
    {
        parent::boot();

        // registering a callback to be executed upon the creation of an activity AR
        static::creating(function ($girl) {

            // produce a slug based on the activity name
            $slug = Str::slug($girl->name) . '-' .now()->format('Y-m-d');

            // check to see if any other slugs exist that are the same & count them
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

            // if other slugs exist that are the same, append the count to the slug
            $girl->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }
}
