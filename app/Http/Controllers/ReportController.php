<?php

namespace App\Http\Controllers;

use App\Models\Chicken;
use App\Models\Daily_chicken;
use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;
use App\Models\Standard;

class ReportController extends Controller
{
 
    // Mortality Report
    function getMortality(){

        $flock = Flock::all();
        $farm = Farm::all();

        return view ('admin/report/introMortality')->with('flockList', $flock)->with('farmList', $farm);
    }

    function fetchMortalityByFlock(Request $req){

        $flockId = $req->input('flock_id');
        $farmId = $req->input('farm_id');

        $flock = Flock::find($flockId)->get()->first();
        $farm = Farm::find($farmId)->get()->first();

        $house = House::where('farm_id',$farmId)->get();

        //House 1
        $house1 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', 2)
                    -> get()->first();
        
        $daily1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> get();
        
        $sum1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> sum('mortality');

        return view ('admin/report/mortalityReport')->with('flock', $flock)->with('farm', $farm)
        ->with('house1', $house1)->with('daily1', $daily1)->with('sum1', $sum1);
    }
    function fetchMortalityByFarm(Request $req){
        return view ('admin/report/mortalityReport');
    }
    function fetchMortalityByDate(Request $req){
        return view ('admin/report/mortalityReport');
    }

    //Rejection report 
    function getRejection(){

        $flock = Flock::all();
        $farm = Farm::all();

        return view ('admin/report/introRejection')->with('flockList', $flock)->with('farmList', $farm);
    }

    //Weight report
    function getWeight(){

        $flock = Flock::all();
        $farm = Farm::all();

        return view ('admin/report/introWeight')->with('flockList', $flock)->with('farmList', $farm);
    }

    function fetchWeightByFlock(Request $req){

        $flockId = $req->input('flock_id');
        $farmId = $req->input('farm_id');

        $standard = Standard::all();

        $flock = Flock::find($flockId)->get()->first();
        $farm = Farm::find($farmId)->get()->first();

        $weightList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->where('chickens.flock_id', $flockId)
                    ->where('chickens.status', 0)
                    ->get('daily_chickens.*', 'chicken.date as age_date');

        return view ('admin/report/weightReport')->with('flock', $flock)->with('farm', $farm)
        ->with('weightList', $weightList)->with('standardList', $standard);
    }
    function fetchWeightByFarm(Request $req){
        
        $farmId = $req->input('farm_id');

        $standard = Standard::all();

        $flock = Flock::where('status', 1)
        ->get()->first();

        $farm = Farm::find($farmId)->get()->first();

        $weightList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->where('chickens.status', 1)
                    ->get('daily_chickens.*', 'chicken.date as age_date');

        return view ('admin/report/weightReport')->with('flock', $flock)->with('farm', $farm)
        ->with('weightList', $weightList)->with('standardList', $standard);
    }
    function fetchWeightByDate(Request $req){
        return view ('admin/report/mortalityReport');
    }

    //Feed consumption report
    function getFeed(){

        $flock = Flock::all();
        $farm = Farm::all();

        return view ('admin/report/introFeed')->with('flockList', $flock)->with('farmList', $farm);
    }

    //Sales Report
    function getSales(){

        $flock = Flock::all();
        $farm = Farm::all();

        return view ('admin/report/introSales')->with('flockList', $flock)->with('farmList', $farm);
    }

    //Expense Report
    function getExpense(){

        $flock = Flock::all();
        $farm = Farm::all();

        return view ('admin/report/introExpense')->with('flockList', $flock)->with('farmList', $farm);
    }
}