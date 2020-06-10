<?php

use Illuminate\Database\Seeder;
use App\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //hij maakt 25 steden aan
    public function run()
    {
        factory(City::class, 25)->create();
    }
}
