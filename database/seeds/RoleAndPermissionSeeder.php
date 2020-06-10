<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name' => 'create province']);
        Permission::create(['name' => 'edit province']);
        Permission::create(['name' => 'delete province']);

        Permission::create(['name' => 'create city']);
        Permission::create(['name' => 'edit city']);
        Permission::create(['name' => 'delete city']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
