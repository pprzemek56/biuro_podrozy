<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContinentController extends Controller
{

    public function offer(Request $request){
        $continents = Continent::all();

        if($request['od_kiedy'] == null and $request['do_kiedy'] == null){
            $trips = Trip::all();
            for($i = 0; $i < sizeof($trips); $i+=1){
                if(strtotime($trips[$i]->start_date) < strtotime(date('Y-m-d'))){
                    unset($trips[$i]);
                }
            }
            return view('offer',['continents'=>$continents, 'trips'=>$trips]);
        }

        $trips = DB::select('select * from trips where start_date >= ? and end_date <= ?',
            [$this->string_to_date($request['od_kiedy']),$this->string_to_date($request['do_kiedy'])]);
        for($i = 0; $i < sizeof($trips); $i+=1){
            if(strtotime($trips[$i]->start_date) < strtotime(date('Y-m-d'))){
                unset($trips[$i]);
            }
        }
        return view('offer',['continents'=>$continents, 'trips'=>$trips]);

    }

    private function string_to_date($date){
        $time = strtotime($date);
        $newFormat = date('Y-m-d', $time);
        return $newFormat;
    }
}
