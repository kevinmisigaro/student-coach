<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => 'Dar es Salaam', 
            'country_id' => 1
        ]);

        City::create([
            'name' => 'Mwanza', 
            'country_id' => 1
        ]);

        City::create([
            'name' => 'Morogoro', 
            'country_id' => 1
        ]);

        City::create([
            'name' => 'Arusha', 
            'country_id' => 1
        ]);

        City::create([
            'name' => 'Toronto', 
            'country_id' => 4
        ]);

        City::create([
            'name' => 'Cambridge, Massachusetts',
            'country_id' => 5
        ]);
    }
}
