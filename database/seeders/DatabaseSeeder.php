<?php

namespace Database\Seeders;

use App\Models\SalaryType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CourseSeeder::class,
            InstituteSeeder::class,
            CitySeeder::class,
            PositionSeeder::class,
            DataSeeder::class,
            SalaryTypeSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
