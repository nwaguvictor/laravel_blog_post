<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(\App\User::class);
    }

    // Accessors Of Model
    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }
}
