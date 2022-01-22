<?php

namespace Database\Seeders;

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
            CountrySeeder::class,
            CitySeeder::class,
            AdminSeeder::class,
            StudentSeeder::class,
            CoachSeeder::class,
            UniversitySeeder::class,
            GroupSeeder::class
        ]);
    }
}
