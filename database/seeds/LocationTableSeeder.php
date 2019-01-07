<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//factory(App\Location::class, 100)->create('fr_FR');
        
      $faker = Faker\Factory::create('fr_FR');

        for ($i=0; $i < 100; $i++)  {
        	Location::create([
             'district' => $faker->district,
             'city' => $faker->cityname,
             'lat' => $faker->unique()->latitude(2, 12),
              'lng' => $faker->unique()->longitude(10, 14)
        	]);
       }
    }
}
