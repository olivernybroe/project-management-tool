<?php

use Faker\Generator as Faker;

$factory->define(\App\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'employed_at' => $faker->dateTimeBetween(),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber
    ];
});
