<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->state(User::class, 'students', function (Faker $faker) {
    $course = Course::all()->pluck('id')->toArray();
    $random_key = array_rand($course);
    return [
        'name' => $faker->name,
        'is_admin' => 0,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'registration' => $faker->unixTime($max = 'now'),
        'born_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'course_id' => $course[$random_key],
    ];
});
