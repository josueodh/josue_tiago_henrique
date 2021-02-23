<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Grade;
use App\Subject;
use App\Team;
use App\User;
use Faker\Generator as Faker;

$factory->define(Grade::class, function (Faker $faker) {
    $student = User::all()->pluck('id')->toArray();
    $team = Team::all()->pluck('id')->toArray();
    $random_key = array_rand($student);
    $random_key_team = array_rand($team);
    return [
        'student_id' => $student[$random_key],
        'team_id' => $team[$random_key_team],
        'grade' => $faker->randomNumber($nbDigits = NULL, $strict = false),
    ];
});
