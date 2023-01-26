<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trip = Trip::create([
            'city_id'=>1,
            'period'=>7,
            'price'=>3000,
            'description'=>'Ateny – miasto niezwyklych historii i wspólczesna stolica Grecji. Najwazniejszym symbolem starozytnych Aten jest Akropol. Na liście najwazniejszych zabytków znajdzie sie równiez Teatr Dionizosa, Forum Rzymskie czy slynny Luk Hadriana i Światynia Zeusa Olimpijskiego. Ateny to takze tetniaca nocnym zyciem metropolia. Warto odwiedzić tam muzea, teatry i galerie sztuki.',
            'image'=>'Ateny',
            'free_space'=>20,
            'start_date'=>Carbon::parse('2022-07-30')->format('Y-m-d'),
            'end_date'=>Carbon::parse('2022-08-05')->format('Y-m-d')
        ]);
        $trip->save();
        $trip = Trip::create([
            'city_id'=>2,
            'period'=>7,
            'price'=>3400,
            'description'=>'Na samym poludniu greckiego archipelagu Cyklady lezy bajeczna wyspa, która powstala na skutek wybuchu wulkanu ponad 3600 lat temu. Santoryn, znany takze jako Santorini, oferuje turystom magiczne zachody slońca, wspaniale krajobrazy oraz wyjatkowe plaze. Poznaj wyspe, która w starozytności rzadzili Minojczycy, a teraz jest odwiedzana przez miliony turystów z calego świata.',
            'image'=>'Santoryn',
            'free_space'=>20,
            'start_date'=>Carbon::parse('2022-07-31')->format('Y-m-d'),
            'end_date'=>Carbon::parse('2022-08-06')->format('Y-m-d')
        ]);
        $trip->save();
        $trip = Trip::create([
            'city_id'=>3,
            'period'=>10,
            'price'=>5200,
            'description'=>'Pelna zycia, luksusu i uroku wyspa na Cykladach na Morzu Egejskim. Miejsce, które uwielbiaja celebryci i imprezowicze, plaze, które podziwiaja turyści, Grecja w wydaniu, jakie czaruje wszystkich! Kosmopolityczne, modne, przyciagajace – oto Mykonos.',
            'image'=>'Mykonos',
            'free_space'=>20,
            'start_date'=>Carbon::parse('2022-08-20')->format('Y-m-d'),
            'end_date'=>Carbon::parse('2022-08-29')->format('Y-m-d')
        ]);
        $trip->save();
        $trip = Trip::create([
            'city_id'=>5,
            'period'=>5,
            'price'=>2800,
            'description'=>'Madryt jest stolica i najwiekszym, choć wcale nie najpopularniejszym, miastem Hiszpanii. Pod tym wzgledem ustepuje jedynie Barcelonie. Nie ma w nim bowiem plaz, jest za to niesamowita architektura, muzea z cennymi dzielami sztuki i malownicze widoki, które zapewnia wyjatkowe polozenia miasta 600 m n.p.m. Jedno jest pewne - o nudzie nie ma mowy zarówno w dzień, jak i w nocy.',
            'image'=>'Madryt',
            'free_space'=>20,
            'start_date'=>Carbon::parse('2022-07-18')->format('Y-m-d'),
            'end_date'=>Carbon::parse('2022-07-22')->format('Y-m-d')
        ]);
        $trip->save();
        $trip = Trip::create([
            'city_id'=>6,
            'period'=>8,
            'price'=>3000,
            'description'=>'Barcelona to duze miasto, drugie najwieksze po Madrycie w Hiszpanii. Jest stolica wspólnoty autonomicznej Katalonii. Polozona jest nad Morzem Śródziemnym, mniej wiecej w środku linii brzegowej Katalonii, wciśnieta pomiedzy morze i góry Serra de Collserola.',
            'image'=>'Barcelona',
            'free_space'=>20,
            'start_date'=>Carbon::parse('2022-07-15')->format('Y-m-d'),
            'end_date'=>Carbon::parse('2022-07-22')->format('Y-m-d')
        ]);
        $trip->save();
        $trip = Trip::create([
            'city_id'=>7,
            'period'=>10,
            'price'=>4800,
            'description'=>'Sewilla, stolica i najwieksze miasto Andaluzji, to jedno z najciekawszych miast calego Pólwyspu Iberyjskiego. Do niedawna Sewilla kojarzyla sie w Polsce z dwoma klubami pilkarskimi, a dziś dzieki ofercie tanich linii lotniczych coraz wiecej turystów decyduje sie na odwiedziny tego historycznego miejsca.',
            'image'=>'Sevilla',
            'free_space'=>20,
            'start_date'=>Carbon::parse('2022-09-10')->format('Y-m-d'),
            'end_date'=>Carbon::parse('2022-09-19')->format('Y-m-d')
        ]);
        $trip->save();
    }
}
