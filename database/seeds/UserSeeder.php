<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'name'=>'Admin',
            'email'=>'miranda@admin.com',
            'password'=> bcrypt('test123')])
            ->each(function (User $user){
                $user->assignRole('admin');
            });
    }
}
