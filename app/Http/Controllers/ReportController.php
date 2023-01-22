<?php

namespace App\Http\Controllers;

use App\Models\Chicken;
use App\Models\Daily_chicken;
use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;
use App\Models\Standard;
use App\Models\Expense;
use App\Models\Sale;

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

        $houseList = House::where('farm_id',$farmId)->pluck('id')->toArray();

        //House 1
        $house1 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[0])
                    -> get()->first();
        if($house1){
            $daily1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> get();
        
        $sum1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> sum('mortality');
        }
        else{
            $daily1 = "";
            $sum1 = "";
        }
        

        //House 2
        $house2 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[1])
                    -> get()->first();
        
        if($house2){
            $daily2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> get();
        
            $sum2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> sum('mortality');
        }
        else{
            $daily2 = "";
            $sum2 = "";
        }

        //House 3
        $house3 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[2])
                    -> get()->first();
        
        if($house3){
            $daily3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> get();
        
            $sum3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> sum('mortality');
        }
        else{
            $daily3 = "";
            $sum3 = "";
        }

        //House 4
        $house4 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[3])
                    -> get()->first();
        
        if($house4){
            $daily4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> get();
        
            $sum4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> sum('mortality');
        }
        else{
            $daily4 = "";
            $sum4 = "";
        }

        //House 5
        $house5 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[4])
                    -> get()->first();
        
        if($house5){
            $daily5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> get();
        
            $sum5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> sum('mortality');
        }
        else{
            $daily5 = "";
            $sum5 = "";
        }

        //House 6
        $house6 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[5])
                    -> get()->first();
        
        if($house6){
            $daily6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> get();
        
            $sum6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> sum('mortality');
        }
        else{
            $daily6 = ""; 
            $sum6 = "";
        }

        return view ('admin/report/mortalityReport')->with('flock', $flock)->with('farm', $farm)
        ->with('house1', $house1)->with('daily1', $daily1)->with('sum1', $sum1)
        ->with('house2', $house2)->with('daily2', $daily2)->with('sum2', $sum2)
        ->with('house3', $house3)->with('daily3', $daily3)->with('sum3', $sum3)
        ->with('house4', $house4)->with('daily4', $daily4)->with('sum4', $sum4)
        ->with('house5', $house5)->with('daily5', $daily5)->with('sum5', $sum5)
        ->with('house6', $house6)->with('daily6', $daily6)->with('sum6', $sum6);
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

        $flock = Flock::where('id',$flockId)->get()->first();
        $farm = Farm::where('id',$farmId)->get()->first();

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

        $farm = Farm::where('id',$farmId)->get()->first();

        $weightList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->where('chickens.status', 1)
                    ->get('daily_chickens.*', 'chicken.date as age_date');

        return view ('admin/report/weightReport')->with('flock', $flock)->with('farm', $farm)
        ->with('weightList', $weightList)->with('standardList', $standard);
    }
    function fetchWeightByDate(Request $req){
        $farmId = $req->input('farm_id');
        $start = $req->input('start_date');
        $end = $req->input('end_date');

        $flock = null;

        $duration = $start." to ".$end;

        $standard = Standard::all();

        $farm = Farm::where('id',$farmId)->get()->first();

        $weightList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->whereBetween('daily_chickens.date', [$start, $end])
                    ->get('daily_chickens.*', 'chicken.date as age_date');

        return view ('admin/report/weightReport')->with('farm', $farm)->with('flock', $flock)
        ->with('weightList', $weightList)->with('standardList', $standard)->with('duration', $duration);
    }

    //Feed consumption report
    function getFeed(){

        $flock = Flock::all();
        $farm = Farm::all();

        return view ('admin/report/introFeed')->with('flockList', $flock)->with('farmList', $farm);
    }
    function fetchFeedByFlock(Request $req){

        $flockId = $req->input('flock_id');
        $farmId = $req->input('farm_id');

        $standard = Standard::all();

        $flock = Flock::where('id',$flockId)->get()->first();
        $farm = Farm::where('id',$farmId)->get()->first();

        $feedList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->where('chickens.flock_id', $flockId)
                    ->where('chickens.status', 0)
                    ->get('daily_chickens.*', 'chickens.date as age_date');

        return view ('admin/report/fcrReport')->with('flock', $flock)->with('farm', $farm)
        ->with('feedList', $feedList)->with('standardList', $standard);
    }
    function fetchFeedByFarm(Request $req){
        
        $farmId = $req->input('farm_id');

        $standard = Standard::all();

        $flock = Flock::where('status', 1)
        ->get()->first();

        $farm = Farm::where('id',$farmId)->get()->first();

        $feedList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->where('chickens.status', 1)
                    ->get('daily_chickens.*', 'chickens.date as age_date');

        return view ('admin/report/fcrReport')->with('flock', $flock)->with('farm', $farm)
        ->with('feedList', $feedList)->with('standardList', $standard);
    }
    function fetchFeedByDate(Request $req){
        $farmId = $req->input('farm_id');
        $start = $req->input('start_date');
        $end = $req->input('end_date');

        $flock = null;

        $duration = $start." to ".$end;

        $standard = Standard::all();

        $farm = Farm::where('id',$farmId)->get()->first();

        $feedList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->whereBetween('daily_chickens.date', [$start, $end])
                    ->get('daily_chickens.*', 'chickens.date as age_date');

        return view ('admin/report/fcrReport')->with('farm', $farm)->with('flock', $flock)
        ->with('feedList', $feedList)->with('standardList', $standard)->with('duration', $duration);
    }

    //Sales Report
    function getSales(){

        $flock = Flock::all();
        $farm = Farm::all();

        return view ('admin/report/introSales')->with('flockList', $flock)->with('farmList', $farm);
    }
    function fetchSalesByFlock(Request $req){

        $flockId = $req->input('flock_id');
        $farmId = $req->input('farm_id');

        $standard = Standard::all();

        $flock = Flock::where('id',$flockId)->get()->first();
        $farm = Farm::where('id',$farmId)->get()->first();

        // $feedList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
        //             ->where('chickens.farm_id', $farmId)
        //             ->where('chickens.flock_id', $flockId)
        //             ->where('chickens.status', 0)
        //             ->get('daily_chickens.*', 'chicken.date as age_date');
        $saleList = Sale::join('chickens','chickens.house_id','=','sales.house_id')
                    ->where('sales.flock_id', $flockId)
                    ->where('sales.farm_id', $farmId)
                    ->where('chickens.status', 0)
                    ->select('sales.*', 'chickens.date as age_date')
                    ->get();

        return view ('admin/report/salesReport')->with('flock', $flock)->with('farm', $farm)
        ->with('saleList', $saleList)->with('standardList', $standard);
    }
    function fetchSalesByFarm(Request $req){
        
        $farmId = $req->input('farm_id');

        $standard = Standard::all();

        $flock = Flock::where('status', 1)
        ->get()->first();
        $farm = Farm::where('id',$farmId)->get()->first();

        $saleList = Sale::join('chickens','chickens.house_id','=','sales.house_id')
                    ->where('sales.farm_id', $farmId)
                    ->where('chickens.status', 1)
                    ->select('sales.*', 'chickens.date as age_date')
                    ->get();

        return view ('admin/report/salesReport')->with('flock', $flock)->with('farm', $farm)
        ->with('saleList', $saleList)->with('standardList', $standard);
    }
    function fetchSalesByDate(Request $req){
        $farmId = $req->input('farm_id');
        $start = $req->input('start_date');
        $end = $req->input('end_date');

        $flock = null;

        $duration = $start." to ".$end;

        $standard = Standard::all();

        $farm = Farm::where('id',$farmId)->get()->first();

        // $feedList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
        //             ->where('chickens.farm_id', $farmId)
        //             ->whereBetween('daily_chickens.date', [$start, $end])
        //             ->get('daily_chickens.*', 'chicken.date as age_date');

        $saleList = Sale::join('chickens','chickens.house_id','=','sales.house_id')
                    ->where('sales.farm_id', $farmId)
                    ->whereBetween('sales.date', [$start, $end])
                    ->select('sales.*', 'chickens.date as age_date')
                    ->get();

        return view ('admin/report/salesReport')->with('farm', $farm)->with('flock', $flock)
        ->with('saleList', $saleList)->with('standardList', $standard)->with('duration', $duration);
    }

    //Expense Report
    function getExpense(){

        $flock = Flock::all();
        $farm = Farm::all();

        return view ('admin/report/introExpense')->with('flockList', $flock)->with('farmList', $farm);
    }
    function fetchExpenseByFarm(Request $req){
        
        $farmId = $req->input('farm_id');
        $duration = "";
        
        $farm = Farm::where('id',$farmId)->get()->first();

        $expenseList=Expense::where('farm_id', $farmId)->get();

        return view ('admin/report/expenseReport')->with('farm', $farm)
        ->with('expenseList', $expenseList)->with('duration', $duration);
    }
    function fetchExpenseByDate(Request $req){
        $farmId = $req->input('farm_id');
        $start = $req->input('start_date');
        $end = $req->input('end_date');

        $duration = $start." to ".$end;

        $farm = Farm::where('id',$farmId)->get()->first();

        $expenseList=Expense::where('farm_id', $farmId)
        ->whereBetween('date', [$start, $end])->get();

        return view ('admin/report/expenseReport')->with('farm', $farm)
        ->with('expenseList', $expenseList)->with('duration', $duration);
    }
}