<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Aluno;
use Faker\Generator as Faker;

$factory->define(Aluno::class, function (Faker $faker) {
    return [
        'numeroMatricula' => $faker->numberBetween($min = 10000, $max = 99999),
        'ira' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'name' => $faker->name($gender = 'male'),
    ];
});