<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\City;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Trip;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CountryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountryRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreCountryRequest $request)
    {
        $continent = Continent::where('name', '=', $request->get('continent'))->first();
        Country::create(
            ['continent_id' => $continent->id,
                'name'=>$request['name']
            ]);

        return redirect()->back()->with('alert','Kraj dodany pomyślnie');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCountryRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateCountryRequest $request, $id){
        $request->validate([
            'name' => 'required|string|max:30',
        ]);

        $continent = Continent::where('name', '=', $request->get('continent'))->first();

        Country::where('id', '=', $id)->update([
            'continent_id' => $continent->id,
            'name'=>$request['name']
        ]);

        return redirect()->back()->with('alert','Zaktualizowane dane');
    }

    public function create(){
        $continents = Continent::all();
        return view('countries.edit_create',['country' => null,'continents'=>$continents]);
    }

    public function edit($id){
        $contnients = Continent::all();
        if($id == 0){
            return view('countries.edit_create',['country'=>null,'contients'=>$contnients]);
        }
        $country = Country::where('id', '=', $id)->first();
        return view('countries.edit_create',['country' => $country,'continents'=>$contnients]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $city = City::where('country_id', '=', $id)->first();
        if($city == null){
            $country->delete();
            return redirect()->back()->with('alert', 'kraj został usunięty');
        }
        return redirect()->back()->with('alert', 'Błąd, do danego kraju przypisane jest istniejąca miasto');
    }
}
