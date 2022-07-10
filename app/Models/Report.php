<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['video_id', 'user_id', 'name', 'email', 'ph_number', 'info'];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function video()
    {
        return $this->hasOne(Video::class, 'id');
    }
}
