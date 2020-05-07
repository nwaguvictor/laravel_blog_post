<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body', 'image', 'category_id'];

    public function user() {
        return $this->belongsTo(\App\User::class);
    }

    public function category() {
        return $this->belongsTo(\App\Category::class);
    }

    public function comments() {
        return $this->hasMany(\App\Comments::class);
    }

    public function comment() {
        return $this->hasOne(\App\Comments::class);
    }
}
