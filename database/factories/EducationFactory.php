<?php

use Faker\Generator as Faker;

$factory->define(\App\Education::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->jobTitle,
        'school_id' => function() {
            return factory(\App\School::class)->create()->getKey();
        }
    ];
});
