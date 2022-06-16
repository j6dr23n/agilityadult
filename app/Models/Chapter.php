<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model implements Viewable
{
    use HasFactory,InteractsWithViews;

    protected $fillable = ['manga_id','chapter_no','path','pdfPath'];
}
