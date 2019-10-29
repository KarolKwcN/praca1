<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_serwisant = Role::where('name', 'Serwisant')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name ='Ola';
        $user->email = 'ola@wp.pl';
        $user->password = bcrypt('qaz123!!');
        $user->save();
        $user->roles()->attach($role_user);

    }
}
