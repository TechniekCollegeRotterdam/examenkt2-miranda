<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Province;
use Faker\Generator as Faker;


//invullen hoe standaard data in een rij zal komen
$factory->define(Province::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
