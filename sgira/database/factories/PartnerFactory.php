<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Partner;
use Faker\Generator as Faker;

        
$factory->define(Partner::class, function (Faker $faker) {
    if (!\File::exists(public_path('img\partners'))) {
        \File::makeDirectory(public_path('img\partners'));  //follow the declaration to see the complete signature
    }
    $filepath = $faker->image(public_path('img\partners'));
    $image = array_values(array_slice(explode('/', $filepath), -1))[0];
    $name= $faker->unique()->name;
    dd($filepath);
    return [
        'name' => $name,
        'imglink' => $image,
    ];
});
