<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_user = Role::where('name', 'user')->first();
        $role_admin  = Role::where('name', 'admin')->first();    
        $user = new User();
        $user->username = 'alejandro';
        $user->password = bcrypt('welcometotheteam');
        $user->save();
        $user->roles()->attach($role_user);   
        $admin = new User();
        $admin->username = 'admin';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
