<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
use App\User;
use App\Subject;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    $teacher = User::where('is_admin',1)->pluck('id')->toArray();
    $random_key = array_rand($teacher);
    $subject = Subject::all()->pluck('id')->toArray();
    $random_subject = array_rand($subject);
    return [
        'name' => $faker->name,
        'teacher_id' => $teacher[$random_key],
        'year' => $faker->year,
        'semester'=>rand(1,2),
        'subject_id' =>$subject[$random_subject],

    ];
});
