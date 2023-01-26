<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function cancel($id){
        if(!Auth::check()){
            return redirect('/home')->back()->with('alert', 'Musisz byc zalogowany aby przejść do tej podstrony!');
        }else{
            $trip = Trip::find($id);

            if((strtotime($trip->start_date) - strtotime(date('Y-m-d')))/60/60/24 < 5){
                return redirect()->back()->with('alert', 'Nie możesz odwołać rezerwacji mniej niż 5 dni przed wyjazdem!');
            }else{
                $user = Auth::user();
                $trip = $user->trips()->where('trip_id', $id)->first();
                if($trip == null){
                    return redirect()->back()->with('alert', 'Nie jestes zapisany do tej wycieczki');
                }else{
                    $user->trips()->detach($trip);
                    $trip = Trip::find($id);
                    $trip->free_space = ($trip->free_space + 1);
                    $trip->update();
                    return redirect()->back()->with('alert', 'Rezerwacja odwołana pomyślnie');
                }

            }

        }

    }

    public function account(){
        if(!Auth::check()){
            return redirect('/home')->back()->with('alert', 'Musisz byc zalogowany aby przejść do tej podstrony!');
        }else{
            $user = Auth::user();
            $trips = null;
            $countries = null;
            $users = null;
            $cities = null;
            if($user->role_id == 1){

                $trips = Trip::all();
                $countries = Country::all();
                $cities = City::all();
                $users = User::all();


                return view('user.user',['trips'=>$trips, 'countries'=>$countries, 'cities'=>$cities, 'users'=>$users]);


            }else{

                $trips = $user->trips()->where('user_id', $user->id)->get();

                return view('user.user',['trips'=>$trips, 'countries'=>$countries, 'cities'=>$cities, 'users'=>$users]);
            }
        }
    }


    public function save($id){
        if(!Auth::check()){
            return redirect()->back()->with('alert','Musisz być zalogowany aby zapisać się do wycieczki!');
        }else{
            $user = Auth::user();
            if($user->role_id == 1){
                return redirect()->back()->with('alert','Musisz być zalogowany jako zwykły użytkownik!');
            }else{
                foreach($user->trips as $trip){
                    if($trip->trip_id == $id){
                        return redirect()->back()->with('alert','Jesteś już zapisany do tej wycieczki');
                    }
                }
            }
        }

        $user->trips()->attach($id);
        $trip = Trip::find($id);
        $trip->free_space = ($trip->free_space - 1);
        $trip->update();

        return redirect()->back()->with('alert','Udało Ci się zapisać na wycieczkę');


    }
}
