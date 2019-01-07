<?php

use Faker\Generator as Faker;
use App\Location;


$factory->define(Location::class, function (Faker $faker) {
    return [
        //
        'district' => $faker->city,
             'city' => $faker->region,
             'lat' => $faker->unique()->latitude(44, 46),
              'lng' => $faker->unique()->longitude(-2, 6)
       
    ];
});
