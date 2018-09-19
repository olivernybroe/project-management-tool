<?php

use Faker\Generator as Faker;

$factory->define(\App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'manager_id' => function() {
            return factory(\App\Employee::class)->create()->getKey();
        },
        'preferred_employees' => $faker->numberBetween(0, 10),
    ];
});
