<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    //volgorde bepalen en uitvoeren seeds
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(ProvinceSeeder::class);
    }
}
