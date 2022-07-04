<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public $roles = [
        'User', 
        'Member', 
        'Admin',         
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role) {
            DB::table('roles')->updateOrInsert([
                'name' => $role
            ]);
        }
    }
}
