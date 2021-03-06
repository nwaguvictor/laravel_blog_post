<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relation of users amd many posts
    public function posts()
    {
        return $this->hasMany(\App\Post::class);
    }

    // Relation of users and A Post
    public function post()
    {
        return $this->hasOne(\App\Post::class);
    }

    // Relation of roles and users
    public function role()
    {
        return $this->belongsTo(\App\Role::class);
    }

    // Accessing the posts comments
    public function postComments()
    {
        return $this->hasManyThrough(\App\Comment::class, \App\Post::class);
    }
    // get user comments
    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }

    // Set Accessor for status
    public function getStatusAttribute($status)
    {
        return [
            1 => 'Active',
            0 => 'Not Active'
        ][$status];
    }

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }

    // Set the mutators for User members
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // Helper functions

    public function isAdmin()
    {
        if (Auth::user()->role->name == 'Admin') {
            return true;
        }
    }

    public function isAuthor()
    {
        if (Auth::user()->role->name == 'Author') {
            return true;
        }
    }
}
