<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bonification;
use App\User;
use App\Partner;
use Faker\Generator as Faker;

$factory->define(Bonification::class, function (Faker $faker) {
    if (!\File::exists(storage_path('app/public/img/bonifications'))) {
        \File::makeDirectory(storage_path('app/public/img/bonifications'));  //follow the declaration to see the complete signature
    }
    $filepath = $faker->image(storage_path('app/public/img/bonifications'), $width = 640, $height = 480,  true, false);
    $image = array_values(array_slice(explode('/', $filepath), -1))[0];

    $student = User::where('is_admin', 0)->pluck('id')->toArray();
    $partner = Partner::all()->pluck('id')->toArray();

    $random_key = array_rand($student);
    $random_key_partner = array_rand($partner);
    return [
        'imglink' => 'img/bonifications/' . $image,
        'description' =>$faker->text($maxNbChars = 50),
        'expirationDate' =>$faker->date($format = 'Y-m-d', $max = 'now'),
        'student_id' =>$student[$random_key],
        'partner_id' =>$partner[$random_key_partner],
    ];
});
