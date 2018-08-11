<?php

use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name:en' => $faker->name,
        'name:kh' => $faker->name,
        'description:en' => $faker->text,
        'description:kh' => $faker->text,
        'status' => $faker->boolean,
        'price' => 594,
        'cost' => 434,
        'discount' => 12,
        'qty' => 3424,
        'type_id' => rand(1, 50)
    ];
});
