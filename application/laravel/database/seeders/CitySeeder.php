<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $row = 0;
        if (($handle = fopen("database/seeders/cities.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $row++;
                if($row == 1)continue;
                $city = City::create([
                    'name' => $data[1],
                    'country_id' => $data[2]
                ]);
                $city->save();
            }
            fclose($handle);
        }
    }
}
