<?php

use Faker\Generator as Faker;
use App\Girls;

$factory->define(Girls::class, function (Faker $faker) {
    return [
        //
       // $faker = Faker\Factory::create('fr_FR');

      
             'name' => $faker->name,
             'lat' => $faker->unique()->latitude(44, 46),
              'lng' => $faker->unique()->longitude(-2, 6)
        	
    ];
});
