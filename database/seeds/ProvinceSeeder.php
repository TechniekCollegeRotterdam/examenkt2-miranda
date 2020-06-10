<?php

use Illuminate\Database\Seeder;
use App\Province;
use App\City;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //hij maakt 12 provincies aan, in elke provincie komen 5 steden
    public function run()
    {
        factory(Province::class, 12)->create()
            ->each(function ($province)
            {
                $province->city()->saveMany(factory(City::class, 5)
                    ->create(['province_id' => $province->id]));
            });
    }
}
