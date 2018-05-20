<?php

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
        'slug' => str_random(10),
        'name' => strtolower($faker->firstName).'.'.mt_rand(100, 999),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'verified' => 1
    ];
});
