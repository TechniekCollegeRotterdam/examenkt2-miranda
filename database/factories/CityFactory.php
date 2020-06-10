<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Province;
use Faker\Generator as Faker;

//invullen hoe standaard data in een rij zal komen en foreign key provinces om deze te koppelen
$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'province_id' => Province::all()->random()->id
    ];
});
