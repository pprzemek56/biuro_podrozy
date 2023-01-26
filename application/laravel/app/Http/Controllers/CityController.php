<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Trip;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;


class CityController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCityRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreCityRequest $request)
    {
        $country = Country::where('name', '=', $request->get('country'))->first();
        City::create(
            ['country_id' => $country->id,
                'name'=>$request['name']
            ]);

        return redirect()->back()->with('alert','Miasto dodane pomyślnie');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCityRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateCityRequest $request, $id){
        $request->validate([
            'name' => 'required|string|max:30',
        ]);

        $country = Country::where('name', '=', $request->get('country'))->first();

        City::where('id', '=', $id)->update([
            'country_id' => $country->id,
            'name'=>$request['name']
        ]);

        return redirect()->back()->with('alert','Zaktualizowane dane');
    }

    public function create(){
        $countries = Country::all();
        return view('cities.edit_create',['city' => null,'countries'=>$countries]);
    }

    public function edit($id){
        $countries = Country::all();
        if($id == 0){
            return view('cities.edit_create',['city'=>null,'countries'=>$countries]);
        }
        $city = City::where('id', '=', $id)->first();
        return view('cities.edit_create',['city' => $city,'countries'=>$countries]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $city = City::find($id);
        $trip = Trip::where('city_id', '=', $id)->first();
        if($trip == null){
            $city->delete();
            return redirect()->back()->with('alert', 'miasto zostało usunięta');
        }
        return redirect()->back()->with('alert', 'Błąd, do danego miasta przypisana jest istniejąca wycieczka');
    }
}
