<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Partner;
use Faker\Generator as Faker;


$factory->define(Partner::class, function (Faker $faker) {
    if (!\File::exists(storage_path('app/public/img/bonifications'))) {
        \File::makeDirectory(storage_path('app/public/img/bonifications'));  //follow the declaration to see the complete signature
    }
    $filepath = $faker->image(storage_path('app/public/img/bonifications'), $width = 640, $height = 480,  true, false);
    $image = array_values(array_slice(explode('/', $filepath), -1))[0];
    return [
        'name' => $faker->company,
        'imglink' => 'img/bonifications/' . $image,
    ];
});
