<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use App\Subject;
use App\User;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    $teacher_id = User::all()->pluck('id')->toArray();
    $random_teacher = array_rand($teacher_id);
    return [
        'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'code' => $faker->randomLetter . $faker->randomLetter . $faker->randomLetter . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit,
        'credits' => 4,
        'teacher_id'  => $teacher_id[$random_teacher]
    ];
});
