<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $admin = new User([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role_id' => 3,
        ],);

        $admin->save();

        $manager = new User([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('manager'),
            'role_id' => 2,
        ],);

        $manager->save();

        $user = new User([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'role_id' => 1,
        ],);

        $user->save();        
    }
}
