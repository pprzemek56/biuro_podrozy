<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::create([
            'name' => 'Grecja',
            'continent_id' => 1
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Hiszpania',
            'continent_id' => 1
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Portugalia',
            'continent_id' => 1
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Chorwacja',
            'continent_id' => 1
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Cypr',
            'continent_id' => 1
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Czarnogóra',
            'continent_id' => 1
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Francja',
            'continent_id' => 1
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Włochy',
            'continent_id' => 1
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'USA',
            'continent_id' => 2
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Meksyk',
            'continent_id' => 2
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Dominikana',
            'continent_id' => 2
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Kostaryka',
            'continent_id' => 2
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Panama',
            'continent_id' => 2
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Brazylia',
            'continent_id' => 3
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Argentyna',
            'continent_id' => 3
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Zjednoczone Emiraty Arabskie',
            'continent_id' => 4
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Chiny',
            'continent_id' => 4
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Japonia',
            'continent_id' => 4
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Korea Południowa',
            'continent_id' => 4
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Malediwy',
            'continent_id' => 4
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Malezja',
            'continent_id' => 4
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Sri Lanka',
            'continent_id' => 4
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Tajlandia',
            'continent_id' => 4
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Singapur',
            'continent_id' => 4
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Egipt',
            'continent_id' => 5
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Kenia',
            'continent_id' => 5
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Madagaskar',
            'continent_id' => 5
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Tanzania',
            'continent_id' => 5
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Republika Południowej Afryki',
            'continent_id' => 5
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Tunezja',
            'continent_id' => 5
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Maroko',
            'continent_id' => 5
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Australia',
            'continent_id' => 6
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Nowa Zelandia',
            'continent_id' => 6
        ]);
        $country->save();
        $country = Country::create([
            'name' => 'Turcja',
            'continent_id' => 1
        ]);
        $country->save();
    }
}
