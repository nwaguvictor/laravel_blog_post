<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'body' => $faker->paragraph . " " . $faker->paragraph . " " . $faker->paragraph,
    ];
});
