<?php

use Faker\Generator as Faker;
use App\Models\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name:en' => $faker->name,
        'name:kh' => $faker->name,
        'description:en' => $faker->text,
        'description:kh' => $faker->text,
        'status' => $faker->boolean
    ];
});
