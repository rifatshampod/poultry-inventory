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
        $houseList = House::all();
        $farm = Farm::all();

        return view ('admin/report/introMortality')->with('flockList', $flock)->with('farmList', $farm)->with('houseList', $houseList);
    }

    function fetchMortalityByFlock(Request $req){

        $flockId = $req->input('flock_id');
        $farmId = $req->input('farm_id');

        $flock = Flock::where('id',$flockId)->get()->first();
        $farm = Farm::where('id',$farmId)->get()->first();

        $houseList = House::where('farm_id',$farmId)->pluck('id')->toArray();

        //House 1
        $house1 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[0])
                    ->where('status',0)
                    -> get()->first();
        if($house1){
            $daily1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> get();
        
        $sum1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> sum('mortality');
                    $avg1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> avg('mortality');
        }
        else{
            $daily1 = "";
            $sum1 = "";
            $avg1 = "";
        }
        

        //House 2
        $house2 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[1])
                    ->where('status',0)
                    -> get()->first();
        
        if($house2){
            $daily2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> get();
        
            $sum2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> sum('mortality');
                    $avg2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> avg('mortality');
        }
        else{
            $daily2 = "";
            $sum2 = "";
            $avg2 = "";
        }

        //House 3
        $house3 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[2])
                    ->where('status',0)
                    -> get()->first();
        
        if($house3){
            $daily3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> get();
        
            $sum3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> sum('mortality');
            
            $avg3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> avg('mortality');
        }
        else{
            $daily3 = "";
            $sum3 = "";
            $avg3 = "";
        }

        //House 4
        $house4 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[3])
                    ->where('status',0)
                    -> get()->first();
        
        if($house4){
            $daily4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> get();
        
            $sum4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> sum('mortality');

            $avg4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> avg('mortality');
        }
        else{
            $daily4 = "";
            $sum4 = "";
            $avg4 = "";
        }

        //House 5
        $house5 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[4])
                    ->where('status',0)
                    -> get()->first();
        
        if($house5){
            $daily5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> get();
        
            $sum5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> sum('mortality');

            $avg5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> avg('mortality');
        }
        else{
            $daily5 = "";
            $sum5 = "";
            $avg5 = "";
        }

        //House 6
        $house6 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[5])
                    ->where('status',0)
                    -> get()->first();
        
        if($house6){
            $daily6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> get();
        
            $sum6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> sum('mortality');

            $avg6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> avg('mortality');
        }
        else{
            $daily6 = ""; 
            $sum6 = "";
            $avg6 = "";
        }

        return view ('admin/report/mortalityReport')->with('flock', $flock)->with('farm', $farm)
        ->with('house1', $house1)->with('daily1', $daily1)->with('sum1', $sum1)->with('avg1', $avg1)
        ->with('house2', $house2)->with('daily2', $daily2)->with('sum2', $sum2)->with('avg2', $avg2)
        ->with('house3', $house3)->with('daily3', $daily3)->with('sum3', $sum3)->with('avg3', $avg3)
        ->with('house4', $house4)->with('daily4', $daily4)->with('sum4', $sum4)->with('avg4', $avg4)
        ->with('house5', $house5)->with('daily5', $daily5)->with('sum5', $sum5)->with('avg5', $avg5)
        ->with('house6', $house6)->with('daily6', $daily6)->with('sum6', $sum6)->with('avg6', $avg6);
    }
    function fetchMortalityByFarm(Request $req){
        $farmId = $req->input('farm_id');

        $flock = "";
        $farm = Farm::where('id',$farmId)->get()->first();

        $houseList = House::where('farm_id',$farmId)->pluck('id')->toArray();

        //House 1
        $house1 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[0])
                    ->where('status',1)
                    ->get()->first();
        if($house1){
            $daily1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> get();
        
            $sum1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> sum('mortality');
            
            $avg1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> avg('mortality');
        }
        else{
            $daily1 = "";
            $sum1 = "";
            $avg1 = "";
        }
        

        //House 2
        $house2 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[1])
                    ->where('status',1)
                    -> get()->first();
        
        if($house2){
            $daily2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> get();
        
            $sum2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> sum('mortality');
            $avg2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> avg('mortality');
        }
        else{
            $daily2 = "";
            $sum2 = "";
            $avg2 = "";
        }

        //House 3
        $house3 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[2])
                    ->where('status',1)
                    -> get()->first();
        
        if($house3){
            $daily3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> get();
        
            $sum3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> sum('mortality');

            $avg3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> avg('mortality');
        }
        else{
            $daily3 = "";
            $sum3 = "";
            $avg3 = "";
        }

        //House 4
        $house4 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[3])
                    ->where('status',1)
                    -> get()->first();
        
        if($house4){
            $daily4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> get();
        
            $sum4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> sum('mortality');

            $avg4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> avg('mortality');
        }
        else{
            $daily4 = "";
            $sum4 = "";
            $avg4 = "";
        }

        //House 5
        $house5 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[4])
                    ->where('status',1)
                    -> get()->first();
        
        if($house5){
            $daily5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> get();
        
            $sum5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> sum('mortality');

            $avg5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> avg('mortality');
        }
        else{
            $daily5 = "";
            $sum5 = "";
            $avg5 = "";
        }

        //House 6
        $house6 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[5])
                    ->where('status',1)
                    -> get()->first();
        
        if($house6){
            $daily6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> get();
        
            $sum6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> sum('mortality');

            $avg6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> avg('mortality');
        }
        else{
            $daily6 = ""; 
            $sum6 = "";
            $avg6 = "";
        }

        return view ('admin/report/mortalityReport')->with('flock', $flock)->with('farm', $farm)
        ->with('house1', $house1)->with('daily1', $daily1)->with('sum1', $sum1)->with('avg1', $avg1)
        ->with('house2', $house2)->with('daily2', $daily2)->with('sum2', $sum2)->with('avg2', $avg2)
        ->with('house3', $house3)->with('daily3', $daily3)->with('sum3', $sum3)->with('avg3', $avg3)
        ->with('house4', $house4)->with('daily4', $daily4)->with('sum4', $sum4)->with('avg4', $avg4)
        ->with('house5', $house5)->with('daily5', $daily5)->with('sum5', $sum5)->with('avg5', $avg5)
        ->with('house6', $house6)->with('daily6', $daily6)->with('sum6', $sum6)->with('avg6', $avg6);
    }
    function fetchMortalityByHouse(Request $req){
        $farmId = $req->input('farm_id');
        $houseId = $req->input('house_id');
        $flock = "";
        $farm = Farm::where('id',$farmId)->get()->first();

        

        //House 
        $chicken = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseId)
                    ->where('status',1)
                    ->get()->first();

        $daily1 = Daily_chicken::where('chicken_id', $chicken['id'])
                    ->get();
        
        $sum1 = Daily_chicken::where('chicken_id', $chicken['id'])
                    ->sum('mortality');

        $avg1 = Daily_chicken::where('chicken_id', $chicken['id'])
                    ->avg('mortality');

        
        return view ('admin/report/mortalityReportHouse')->with('flock', $flock)->with('farm', $farm)
        ->with('house1', $chicken)->with('daily1', $daily1)->with('sum1', $sum1)->with('avg1', $avg1);
    }

    function fetchMortalityByDate(Request $req){
         $farmId = $req->input('farm_id');

        $flock = "";
        $farm = Farm::where('id',$farmId)->get()->first();
        $start = $req->input('start_date');
        $end = $req->input('end_date');

        $houseList = House::where('farm_id',$farmId)->pluck('id')->toArray();

        //House 1
        $house1 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[0])
                    -> get()->first();
        if($house1){
            $daily1 = Daily_chicken::where('chicken_id', $house1['id'])
                    ->whereBetween('date', [$start, $end])
                    -> get();
        
            $sum1 = Daily_chicken::where('chicken_id', $house1['id'])
                    ->whereBetween('date', [$start, $end])-> sum('mortality');
            
            $avg1 = Daily_chicken::where('chicken_id', $house1['id'])
                    ->whereBetween('date', [$start, $end])->avg('mortality');
        }
        else{
            $daily1 = "";
            $sum1 = "";
            $avg1 = "";
        }
        

        //House 2
        $house2 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[1])
                    -> get()->first();
        
        if($house2){
            $daily2 = Daily_chicken::where('chicken_id', $house2['id'])
                    ->whereBetween('date', [$start, $end])-> get();
        
            $sum2 = Daily_chicken::where('chicken_id', $house2['id'])
                    ->whereBetween('date', [$start, $end])-> sum('mortality');

            $avg2 = Daily_chicken::where('chicken_id', $house2['id'])
                    ->whereBetween('date', [$start, $end])->avg('mortality');
        }
        else{
            $daily2 = "";
            $sum2 = "";
            $avg2 = "";
        }

        //House 3
        $house3 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[2])
                    -> get()->first();
        
        if($house3){
            $daily3 = Daily_chicken::where('chicken_id', $house3['id'])
                    ->whereBetween('date', [$start, $end])-> get();
        
            $sum3 = Daily_chicken::where('chicken_id', $house3['id'])
                    ->whereBetween('date', [$start, $end])-> sum('mortality');

            $avg3 = Daily_chicken::where('chicken_id', $house3['id'])
                    ->whereBetween('date', [$start, $end])->avg('mortality');
        }
        else{
            $daily3 = "";
            $sum3 = "";
            $avg3 = "";
        }

        //House 4
        $house4 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[3])
                    -> get()->first();
        
        if($house4){
            $daily4 = Daily_chicken::where('chicken_id', $house4['id'])
                    ->whereBetween('date', [$start, $end])-> get();
        
            $sum4 = Daily_chicken::where('chicken_id', $house4['id'])
                    ->whereBetween('date', [$start, $end])-> sum('mortality');

            $avg4 = Daily_chicken::where('chicken_id', $house4['id'])
                    ->whereBetween('date', [$start, $end])->avg('mortality');
        }
        else{
            $daily4 = "";
            $sum4 = "";
            $avg4 = "";
        }

        //House 5
        $house5 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[4])
                    -> get()->first();
        
        if($house5){
            $daily5 = Daily_chicken::where('chicken_id', $house5['id'])
                    ->whereBetween('date', [$start, $end])-> get();
        
            $sum5 = Daily_chicken::where('chicken_id', $house5['id'])
                    ->whereBetween('date', [$start, $end])-> sum('mortality');

            $avg5 = Daily_chicken::where('chicken_id', $house5['id'])
                    ->whereBetween('date', [$start, $end])->avg('mortality');
        }
        else{
            $daily5 = "";
            $sum5 = "";
            $avg5 = "";
        }

        //House 6
        $house6 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[5])
                    -> get()->first();
        
        if($house6){
            $daily6 = Daily_chicken::where('chicken_id', $house6['id'])
                    ->whereBetween('date', [$start, $end])-> get();
        
            $sum6 = Daily_chicken::where('chicken_id', $house6['id'])
                    ->whereBetween('date', [$start, $end])-> sum('mortality');

            $avg6 = Daily_chicken::where('chicken_id', $house6['id'])
                    ->whereBetween('date', [$start, $end])->avg('mortality');
        }
        else{
            $daily6 = ""; 
            $sum6 = "";
            $avg6 = "";
        }

        return view ('admin/report/mortalityReport')->with('flock', $flock)->with('farm', $farm)
        ->with('house1', $house1)->with('daily1', $daily1)->with('sum1', $sum1)->with('avg1', $avg1)
        ->with('house2', $house2)->with('daily2', $daily2)->with('sum2', $sum2)->with('avg2', $avg2)
        ->with('house3', $house3)->with('daily3', $daily3)->with('sum3', $sum3)->with('avg3', $avg3)
        ->with('house4', $house4)->with('daily4', $daily4)->with('sum4', $sum4)->with('avg4', $avg4)
        ->with('house5', $house5)->with('daily5', $daily5)->with('sum5', $sum5)->with('avg5', $avg5)
        ->with('house6', $house6)->with('daily6', $daily6)->with('sum6', $sum6)->with('avg6', $avg6);
    }










    //Rejection report 
    function getRejection(){

        $flock = Flock::all();
        $farm = Farm::all();
        $houseList = House::all();

        return view ('admin/report/introRejection')->with('flockList', $flock)->with('farmList', $farm)->with('houseList', $houseList);
    }

    function fetchRejectionByFlock(Request $req){

        $flockId = $req->input('flock_id');
        $farmId = $req->input('farm_id');

        $flock = Flock::where('id',$flockId)->get()->first();
        $farm = Farm::where('id',$farmId)->get()->first();

        $houseList = House::where('farm_id',$farmId)->pluck('id')->toArray();

        //House 1
        $house1 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[0])
                    ->where('status',0)
                    -> get()->first();
        if($house1){
            $daily1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> get();
        
        $sum1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> sum('rejection');
        }
        else{
            $daily1 = "";
            $sum1 = "";
        }
        

        //House 2
        $house2 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[1])
                    ->where('status',0)
                    -> get()->first();
        
        if($house2){
            $daily2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> get();
        
            $sum2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> sum('rejection');
        }
        else{
            $daily2 = "";
            $sum2 = "";
        }

        //House 3
        $house3 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[2])
                    ->where('status',0)
                    -> get()->first();
        
        if($house3){
            $daily3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> get();
        
            $sum3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> sum('rejection');
        }
        else{
            $daily3 = "";
            $sum3 = "";
        }

        //House 4
        $house4 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[3])
                    ->where('status',0)
                    -> get()->first();
        
        if($house4){
            $daily4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> get();
        
            $sum4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> sum('rejection');
        }
        else{
            $daily4 = "";
            $sum4 = "";
        }

        //House 5
        $house5 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[4])
                    ->where('status',0)
                    -> get()->first();
        
        if($house5){
            $daily5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> get();
        
            $sum5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> sum('rejection');
        }
        else{
            $daily5 = "";
            $sum5 = "";
        }

        //House 6
        $house6 = Chicken::where('farm_id', $farmId)
                    ->where('flock_id', $flockId)
                    ->where('house_id', $houseList[5])
                    ->where('status',0)
                    -> get()->first();
        
        if($house6){
            $daily6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> get();
        
            $sum6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> sum('rejection');
        }
        else{
            $daily6 = ""; 
            $sum6 = "";
        }

        return view ('admin/report/rejectionReport')->with('flock', $flock)->with('farm', $farm)
        ->with('house1', $house1)->with('daily1', $daily1)->with('sum1', $sum1)
        ->with('house2', $house2)->with('daily2', $daily2)->with('sum2', $sum2)
        ->with('house3', $house3)->with('daily3', $daily3)->with('sum3', $sum3)
        ->with('house4', $house4)->with('daily4', $daily4)->with('sum4', $sum4)
        ->with('house5', $house5)->with('daily5', $daily5)->with('sum5', $sum5)
        ->with('house6', $house6)->with('daily6', $daily6)->with('sum6', $sum6);
    }
    function fetchRejectionByFarm(Request $req){
        $farmId = $req->input('farm_id');

        $flock = "";
        $farm = Farm::where('id',$farmId)->get()->first();

        $houseList = House::where('farm_id',$farmId)->pluck('id')->toArray();

        //House 1
        $house1 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[0])
                    ->where('status',1)
                    -> get()->first();
        if($house1){
            $daily1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> get();
        
        $sum1 = Daily_chicken::where('chicken_id', $house1['id'])
                    -> sum('rejection');
        }
        else{
            $daily1 = "";
            $sum1 = "";
        }
        

        //House 2
        $house2 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[1])
                    ->where('status',1)
                    -> get()->first();
        
        if($house2){
            $daily2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> get();
        
            $sum2 = Daily_chicken::where('chicken_id', $house2['id'])
                    -> sum('rejection');
        }
        else{
            $daily2 = "";
            $sum2 = "";
        }

        //House 3
        $house3 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[2])
                    ->where('status',1)
                    -> get()->first();
        
        if($house3){
            $daily3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> get();
        
            $sum3 = Daily_chicken::where('chicken_id', $house3['id'])
                    -> sum('rejection');
        }
        else{
            $daily3 = "";
            $sum3 = "";
        }

        //House 4
        $house4 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[3])
                    ->where('status',1)
                    -> get()->first();
        
        if($house4){
            $daily4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> get();
        
            $sum4 = Daily_chicken::where('chicken_id', $house4['id'])
                    -> sum('rejection');
        }
        else{
            $daily4 = "";
            $sum4 = "";
        }

        //House 5
        $house5 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[4])
                    ->where('status',1)
                    -> get()->first();
        
        if($house5){
            $daily5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> get();
        
            $sum5 = Daily_chicken::where('chicken_id', $house5['id'])
                    -> sum('rejection');
        }
        else{
            $daily5 = "";
            $sum5 = "";
        }

        //House 6
        $house6 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[5])
                    ->where('status',1)
                    -> get()->first();
        
        if($house6){
            $daily6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> get();
        
            $sum6 = Daily_chicken::where('chicken_id', $house6['id'])
                    -> sum('rejection');
        }
        else{
            $daily6 = ""; 
            $sum6 = "";
        }

        return view ('admin/report/rejectionReport')->with('flock', $flock)->with('farm', $farm)
        ->with('house1', $house1)->with('daily1', $daily1)->with('sum1', $sum1)
        ->with('house2', $house2)->with('daily2', $daily2)->with('sum2', $sum2)
        ->with('house3', $house3)->with('daily3', $daily3)->with('sum3', $sum3)
        ->with('house4', $house4)->with('daily4', $daily4)->with('sum4', $sum4)
        ->with('house5', $house5)->with('daily5', $daily5)->with('sum5', $sum5)
        ->with('house6', $house6)->with('daily6', $daily6)->with('sum6', $sum6);
    }
    function fetchREjectionByHouse(Request $req){
        $farmId = $req->input('farm_id');
        $houseId = $req->input('house_id');
        $flock = "";
        $farm = Farm::where('id',$farmId)->get()->first();

        //House 
        $chicken = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseId)
                    ->where('status',1)
                    ->get()->first();

            $daily1 = Daily_chicken::where('chicken_id', $chicken['id'])
                    ->get();
        
        $sum1 = Daily_chicken::where('chicken_id', $chicken['id'])
                    ->sum('rejection');

        
        return view ('admin/report/rejectionReportHouse')->with('flock', $flock)->with('farm', $farm)
        ->with('house1', $chicken)->with('daily1', $daily1)->with('sum1', $sum1);
    }
    function fetchRejectionByDate(Request $req){
         $farmId = $req->input('farm_id');

        $flock = "";
        $farm = Farm::where('id',$farmId)->get()->first();
        $start = $req->input('start_date');
        $end = $req->input('end_date');

        $houseList = House::where('farm_id',$farmId)->pluck('id')->toArray();

        //House 1
        $house1 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[0])
                    -> get()->first();
        if($house1){
            $daily1 = Daily_chicken::where('chicken_id', $house1['id'])
                    ->whereBetween('date', [$start, $end])
                    -> get();
        
        $sum1 = Daily_chicken::where('chicken_id', $house1['id'])
                    ->whereBetween('date', [$start, $end])-> sum('rejection');
        }
        else{
            $daily1 = "";
            $sum1 = "";
        }
        

        //House 2
        $house2 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[1])
                    -> get()->first();
        
        if($house2){
            $daily2 = Daily_chicken::where('chicken_id', $house2['id'])
                    ->whereBetween('date', [$start, $end])-> get();
        
            $sum2 = Daily_chicken::where('chicken_id', $house2['id'])
                    ->whereBetween('date', [$start, $end])-> sum('rejection');
        }
        else{
            $daily2 = "";
            $sum2 = "";
        }

        //House 3
        $house3 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[2])
                    -> get()->first();
        
        if($house3){
            $daily3 = Daily_chicken::where('chicken_id', $house3['id'])
                    ->whereBetween('date', [$start, $end])-> get();
        
            $sum3 = Daily_chicken::where('chicken_id', $house3['id'])
                    ->whereBetween('date', [$start, $end])-> sum('rejection');
        }
        else{
            $daily3 = "";
            $sum3 = "";
        }

        //House 4
        $house4 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[3])
                    -> get()->first();
        
        if($house4){
            $daily4 = Daily_chicken::where('chicken_id', $house4['id'])
                    ->whereBetween('date', [$start, $end])-> get();
        
            $sum4 = Daily_chicken::where('chicken_id', $house4['id'])
                    ->whereBetween('date', [$start, $end])-> sum('rejection');
        }
        else{
            $daily4 = "";
            $sum4 = "";
        }

        //House 5
        $house5 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[4])
                    -> get()->first();
        
        if($house5){
            $daily5 = Daily_chicken::where('chicken_id', $house5['id'])
                    ->whereBetween('date', [$start, $end])-> get();
        
            $sum5 = Daily_chicken::where('chicken_id', $house5['id'])
                    ->whereBetween('date', [$start, $end])-> sum('rejection');
        }
        else{
            $daily5 = "";
            $sum5 = "";
        }

        //House 6
        $house6 = Chicken::where('farm_id', $farmId)
                    ->where('house_id', $houseList[5])
                    -> get()->first();
        
        if($house6){
            $daily6 = Daily_chicken::where('chicken_id', $house6['id'])
                    ->whereBetween('date', [$start, $end])-> get();
        
            $sum6 = Daily_chicken::where('chicken_id', $house6['id'])
                    ->whereBetween('date', [$start, $end])-> sum('rejection');
        }
        else{
            $daily6 = ""; 
            $sum6 = "";
        }

        return view ('admin/report/rejectionReport')->with('flock', $flock)->with('farm', $farm)
        ->with('house1', $house1)->with('daily1', $daily1)->with('sum1', $sum1)
        ->with('house2', $house2)->with('daily2', $daily2)->with('sum2', $sum2)
        ->with('house3', $house3)->with('daily3', $daily3)->with('sum3', $sum3)
        ->with('house4', $house4)->with('daily4', $daily4)->with('sum4', $sum4)
        ->with('house5', $house5)->with('daily5', $daily5)->with('sum5', $sum5)
        ->with('house6', $house6)->with('daily6', $daily6)->with('sum6', $sum6);
    }

    //Weight report
    function getWeight(){

        $flock = Flock::all();
        $farm = Farm::all();
        $houseList = House::all();

        return view ('admin/report/introWeight')->with('flockList', $flock)->with('farmList', $farm)->with('houseList', $houseList);
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

        $flock = Flock::where('status', 1)->where('farm_id', $farmId)
        ->get()->first();

        $farm = Farm::where('id',$farmId)->get()->first();

        $weightList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->where('chickens.status', 1)
                    ->get('daily_chickens.*', 'chicken.date as age_date');

        return view ('admin/report/weightReport')->with('flock', $flock)->with('farm', $farm)
        ->with('weightList', $weightList)->with('standardList', $standard);
    }
    function fetchWeightByHouse(Request $req){
        $farmId = $req->input('farm_id');
        $houseId = $req->input('house_id');

        $standard = Standard::all();

        $flock = Flock::where('status', 1)->where('farm_id', $farmId)
        ->get()->first();

        $farm = Farm::where('id',$farmId)->get()->first();

        $weightList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->where('chickens.house_id', $houseId)
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
        $houseList = House::all();

        return view ('admin/report/introFeed')->with('flockList', $flock)->with('farmList', $farm)->with('houseList', $houseList);
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

        $flock = Flock::where('status', 1)->where('farm_id', $farmId)
        ->get()->first();

        $farm = Farm::where('id',$farmId)->get()->first();

        $feedList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->where('chickens.status', 1)
                    ->get('daily_chickens.*', 'chickens.date as age_date');

        return view ('admin/report/fcrReport')->with('flock', $flock)->with('farm', $farm)
        ->with('feedList', $feedList)->with('standardList', $standard);
    }
    function fetchFeedByHouse(Request $req){
        $farmId = $req->input('farm_id');
        $houseId = $req->input('house_id');

        $standard = Standard::all();

        $flock = Flock::where('status', 1)->where('farm_id', $farmId)
        ->get()->first();

        $farm = Farm::where('id',$farmId)->get()->first();

        $feedList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->where('chickens.house_id', $houseId)
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
        $houseList = House::all();

        return view ('admin/report/introSales')->with('flockList', $flock)->with('farmList', $farm)->with('houseList', $houseList);
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

        $flock = Flock::where('status', 1)->where('farm_id', $farmId)
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
    function fetchSalesByHouse(Request $req){
        $farmId = $req->input('farm_id');
        $houseId = $req->input('house_id');
        $standard = Standard::all();

        $flock = Flock::where('status', 1)->where('farm_id', $farmId)
        ->get()->first();
        $farm = Farm::where('id',$farmId)->get()->first();

        $saleList = Sale::join('chickens','chickens.house_id','=','sales.house_id')
                    ->where('sales.farm_id', $farmId)
                    ->where('sales.house_id', $houseId)
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
        $houseList = House::all();

        return view ('admin/report/introExpense')->with('flockList', $flock)->with('farmList', $farm)->with('houseList', $houseList);
    }
    function fetchExpenseByFarm(Request $req){
        
        $farmId = $req->input('farm_id');
        $duration = "";
        
        $farm = Farm::where('id',$farmId)->get()->first();

        $expenseList=Expense::where('farm_id', $farmId)->get();

        return view ('admin/report/expenseReport')->with('farm', $farm)
        ->with('expenseList', $expenseList)->with('duration', $duration);
    }
    function fetchExpenseByHouse(Request $req){
        $farmId = $req->input('farm_id');
        $houseId = $req->input('house_id');
        $duration = "";
        
        $farm = Farm::where('id',$farmId)->get()->first();

        $expenseList=Expense::where('farm_id', $farmId)->where('house_id', $houseId)->get();

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

    //General report
    function getGeneral(){

        $flock = Flock::all();
        $farm = Farm::all();
        $houseList = House::all();

        return view ('admin/report/introGeneral')->with('flockList', $flock)->with('farmList', $farm)->with('houseList', $houseList);
    }
    function fetchGeneralByFlock(Request $req){

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

        return view ('admin/report/generalReport')->with('flock', $flock)->with('farm', $farm)
        ->with('feedList', $feedList)->with('standardList', $standard);
    }
    function fetchGeneralByFarm(Request $req){
        
        $farmId = $req->input('farm_id');

        $standard = Standard::all();

        $flock = Flock::where('status', 1)->where('farm_id', $farmId)
        ->get()->first();

        $farm = Farm::where('id',$farmId)->get()->first();

        $feedList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->where('chickens.status', 1)
                    ->get('daily_chickens.*', 'chickens.date as age_date');

        return view ('admin/report/generalReport')->with('flock', $flock)->with('farm', $farm)
        ->with('feedList', $feedList)->with('standardList', $standard);
    }
    function fetchGeneralByHouse(Request $req){
        $farmId = $req->input('farm_id');
        $houseId = $req->input('house_id');

        $standard = Standard::all();

        $flock = Flock::where('status', 1)->where('farm_id', $farmId)
        ->get()->first();

        $farm = Farm::where('id',$farmId)->get()->first();

        $feedList = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
                    ->where('chickens.farm_id', $farmId)
                    ->where('chickens.house_id', $houseId)
                    ->where('chickens.status', 1)
                    ->get('daily_chickens.*', 'chickens.date as age_date');

        return view ('admin/report/generalReport')->with('flock', $flock)->with('farm', $farm)
        ->with('feedList', $feedList)->with('standardList', $standard);
    }
    function fetchGeneralByDate(Request $req){
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

        return view ('admin/report/generalReport')->with('farm', $farm)->with('flock', $flock)
        ->with('feedList', $feedList)->with('standardList', $standard)->with('duration', $duration);
    }
}