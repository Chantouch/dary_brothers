<?php

use Faker\Generator as Faker;
use App\Models\Slider;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'link' => $faker->url,
        'name:en' => $faker->name,
        'name:kh' => $faker->name,
        'description:kh' => $faker->text,
        'description:en' => $faker->text,
        'text_link:kh' => $faker->text(10),
        'text_link:en' => $faker->text(10),
        'status' => $faker->boolean
    ];
});
