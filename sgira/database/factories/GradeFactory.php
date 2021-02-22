<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Grade;
use App\Subject;
use App\User;
use Faker\Generator as Faker;

$factory->define(Grade::class,function (Faker $faker) {
    $student = User::all()->pluck('id')->toArray();
    $subject = Subject::all()->pluck('id')->toArray();
    $random_key = array_rand($student);
    $random_key_subject = array_rand($subject);
    return [
        'student_id' => $student[$random_key],
        'subject_id'=>$subject[$random_key_subject],
        'grade' => $faker->randomNumber($nbDigits = NULL, $strict = false),
    ];
});
