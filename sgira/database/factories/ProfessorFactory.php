[<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Professor;
use Faker\Generator as Faker;

$factory->define(Professor::class, function (Faker $faker) {
    return [
        'numeroSIAPE' => $faker->numberBetween($min = 10000, $max = 99999),
    ];
});
