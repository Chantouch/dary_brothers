<?php

use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name:en' => $faker->name,
        'name:kh' => $faker->name,
        'description:en' => $faker->text,
        'description:kh' => $faker->text,
        'status' => 1,
        'price' => rand(40, 300),
        'cost' => rand(50, 210),
        'discount' => 12,
        'qty' => 3424,
        'type_id' => rand(1, 50)
    ];
});
