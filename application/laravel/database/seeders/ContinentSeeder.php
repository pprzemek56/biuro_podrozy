<?php

namespace Database\Seeders;

use App\Models\Continent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $continent = Continent::create([
            'name' => 'Europa'
        ]);
        $continent->save();
        $continent = Continent::create([
            'name' => 'Ameryka Północna'
        ]);
        $continent->save();
        $continent = Continent::create([
            'name' => 'Ameryka Południowa'
        ]);
        $continent->save();
        $continent = Continent::create([
            'name' => 'Azja'
        ]);
        $continent->save();
        $continent = Continent::create([
            'name' => 'Afryka'
        ]);
        $continent->save();
        $continent = Continent::create([
            'name' => 'Australia'
        ]);
        $continent->save();
    }
}
