<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Manga extends Model implements Viewable
{
    use HasFactory,InteractsWithViews;

    protected $casts = ['created_at','updated_at'];

    protected $fillable = ['title','slug','poster','genres','tags','type','info','status'];

    public static function boot()
    {
        parent::boot();

        // registering a callback to be executed upon the creation of an activity AR
        static::creating(function ($manga) {

            // produce a slug based on the activity title
            $slug = Str::slug($manga->title) . '-' .now()->format('Y-m-d');

            // check to see if any other slugs exist that are the same & count them
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

            // if other slugs exist that are the same, append the count to the slug
            $manga->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class,'manga_id');
    }
}
