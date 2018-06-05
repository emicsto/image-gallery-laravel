<?php

use App\Image;
use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 15)  ,
        'url' => rand(1,10).'.jpg',
        'user_id' => User::all()->random()->id,
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->text($maxNbChars = 200)  ,
        'user_id' => User::all()->random()->id,
        'image_id' => Image::all()->random()->id,
    ];
});

