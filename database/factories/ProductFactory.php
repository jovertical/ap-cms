<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'slug' => str_random(10),
        'category_id' => 1,
        'name' => ucfirst($faker->name),
        'description' => $faker->text,
        'price' => mt_rand(100, 9999),
        'featured' => mt_rand(0, 1)
    ];
});
