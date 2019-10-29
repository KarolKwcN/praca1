<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->save();

        $role_serwisant = new Role();
        $role_serwisant->name = 'Serwisant';
        $role_serwisant->save();

        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->save();
    }
}
