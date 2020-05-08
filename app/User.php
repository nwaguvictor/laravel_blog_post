<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Setting defaults in the User Model members
    protected $attributes = [
        'status' => 1,
        'role_id' => 2
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    // Set Accessor for status
    public function getStatusAttribute($status)
    {
        return [
            1 => 'Active',
            0 => 'Not Active'
        ][$status];
    }

    // Set the mutators for User members
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
