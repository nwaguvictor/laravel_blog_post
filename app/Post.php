<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Defaults for auth User
    protected $attributes = [
        'user_id' => 1
    ];

    // File path
    protected $path = '/images/';

    protected $fillable = ['title', 'body', 'image', 'category_id'];

    // Model Relationships
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }

    // Accessors of Model
    public function getImageAttribute($image)
    {
        if ($image !== null) {
            return $this->path . $image;
        } else {
            return;
        }
    }

    public function getTitleAttribute($title)
    {
        return ucfirst($title);
    }

    public function getBodyAttribute($body)
    {
        return ucfirst($body);
    }
}
