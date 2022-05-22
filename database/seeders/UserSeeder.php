<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'  => 'Super Admin',
            'slug'  => 'super_admin'
        ]);

        Role::create([
            'name'  => 'Admin',
            'slug'  => 'admin'
        ]);

        User::create([
            'name'      => 'Admin System',
            'username'  => 'admin',
            'password'  => bcrypt('Abdh02Rzl01!levronka'),
            'email'     => 'abduhsyahrizal02@gmail.com',
            'role_id'   => 1
        ]);
        
        User::create([
            'name'      => 'Admin Levronka',
            'username'  => 'adminlevronka',
            'password'  => bcrypt('Levronka2022!'),
            'email'     => 'levronkaofficial@gmail.com',
            'role_id'   => 2
        ]);
    }
}
