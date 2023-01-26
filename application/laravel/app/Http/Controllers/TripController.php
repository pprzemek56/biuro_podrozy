<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Models\City;
use App\Models\Continent;
use App\Models\Trip;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTripRequest $request
     * @return Application|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreTripRequest $request)
    {
        $city = City::where('name', '=', $request->get('city'))->first();
        Trip::create(
            ['city_id' => $city->id,
            'description' => $request['description'],
            'period' => (strtotime($request['end_date']) - strtotime($request['start_date']))/60/60/24,
                'price' => $request['price'],
                'free_space' => $request['free_space'],
                'start_date' => $this->string_to_date($request['start_date']),
                'end_date' => $this->string_to_date($request['end_date']),
                'image'=> $request['city']
            ]);

        return redirect()->back()->with('alert','Wycieczka dodana pomyślnie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $trip = Trip::find($id);
        $trip->delete();
        return redirect()->back()->with('alert', 'Wycieczka została usunięta');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTripRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateTripRequest $request, $id){
        $request->validate([
            'price' => 'required|numeric',
            'free_space' => 'required|numeric|max:20',
            'start_date' => 'required|string|max:10',
            'end_date' => 'required|string|max:10',
            'description' => 'required|string|max:500',
        ]);

        $city = City::where('name', '=', $request->get('city'))->first();

        Trip::where('id', '=', $id)->update([
            'start_date'  => $this->string_to_date($request['start_date']),
            'end_date'  => $this->string_to_date($request['end_date']),
            'period'  => (strtotime($request['end_date']) - strtotime($request['start_date']))/60/60/24,
            'description'  => $request['description'],
            'price'  => $request['price'],
            'city_id'  => $city->id,
            'image' => $request['city'],
            'free_space' => $request['free_space']
        ]);

        return redirect()->back()->with('alert','Zaktualizowane dane');
    }

    public function create(){
        $cities = City::all();
        return view('trips.edit_create',['trip' => null,'cities'=>$cities]);
    }

    public function edit($id){
        $cities = City::all();
        if($id == 0){
            return view('trips.edit_create',['trip'=>null,'cities'=>$cities]);
        }
        $trip = Trip::where('id', '=', $id)->first();
        return view('trips.edit_create',['trip' => $trip,'cities'=>$cities]);
    }

    public function index(){
        $allTrips = Trip::all();
        $trips[] = new Trip();
        for($i = 0; $i < 4; $i += 1){
            $rand = rand(1,sizeof(Trip::all()));
            $trip = Trip::where('id', '=', $allTrips[$rand - 1]->id)->first();
            if(!in_array($trip, $trips)){
                $trips[$i - 1] = $trip;
                if(strtotime($trips[$i - 1]->start_date) < strtotime(date('Y-m-d'))){
                    unset($trips[$i - 1]);
                    $i -= 1;
                }
            }
            else $i -= 1;
        }
        return view('index', ['trips' => $trips]);
    }


    public function show($id){
        $trip = Trip::where('id', '=', $id)->first();
        if($trip==null){
            return redirect()->back();
        }
        return view('trips.show',['trip' => $trip]);
    }

    public function trips(Request $request, $id){
        $continents = Continent::all();
        $cities = City::where('country_id','=',$id)->get();
        $trips = array();

        if($request['od_kiedy'] == null and $request['do_kiedy'] == null){
            foreach ($cities as $city){
                $trip = Trip::where('city_id','=',$city->id)->first();
                if(!($trip == null)){
                    array_push($trips, $trip);
                }
            }
            for($i = 0; $i < sizeof($trips); $i+=1){
                if(strtotime($trips[$i]->start_date) < strtotime(date('Y-m-d'))){
                    unset($trips[$i]);
                }
            }
            return view('trips.trips',['trips'=>$trips, 'continents'=>$continents]);
        }

        foreach ($cities as $city){
            $trip = DB::select('select * from trips where city_id = ? and start_date >= ? and end_date <= ?',
            [$city->id,strtotime($request['od_kiedy']),strtotime($request['do_kiedy'])]);
            if(!($trip == null)){
                for($i = 0; $i < count($trip); $i++)
                {
                    array_push($trips, $trip[$i]);
                }
            }
        }
        for($i = 0; $i < sizeof($trips); $i+=1){
            if(strtotime($trips[$i]->start_date) < strtotime(date('Y-m-d'))){
                unset($trips[$i]);
            }
        }

        return view('trips.trips',['trips'=>$trips, 'continents'=>$continents]);


    }

    private function string_to_date($date){
        $time = strtotime($date);
        $newFormat = date('Y-m-d', $time);
        return $newFormat;
    }

}
