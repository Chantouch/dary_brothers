<?php

use Faker\Generator as Faker;
use App\Models\Customer;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret',
        'remember_token' => str_random(10),
        'address' => $faker->address,
        'date_of_birth' => $faker->date('Y-m-d'),
        'phone_number' => $faker->phoneNumber
    ];
});
