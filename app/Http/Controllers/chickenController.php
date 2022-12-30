<?php

namespace App\Http\Controllers;

use App\Models\Chicken;
use App\Models\Daily_chicken;
use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;
use App\Models\Total_feed;
use Illuminate\Support\Facades\DB;


class chickenController extends Controller
{
    function getDoc(){

        $farm1 = Farm::where('id',1)
        ->first();

        $farm2 = Farm::where('id',2)
        ->first();

        $farm3 = Farm::where('id',3)
        ->first();

        $farm4 = Farm::where('id',4)
        ->first();

        $house1= House::where('farm_id',1)
        ->get();
        $house2= House::where('farm_id',2)
        ->get();
        $house3= House::where('farm_id',3)
        ->get();
        $house4= House::where('farm_id',4)
        ->get();

        $flock = Flock::where('status',1)
        ->first();

        $docList1 = Chicken::where('farm_id',1)
        ->get();
        $docList2 = Chicken::where('farm_id',2)
        ->get();
        $docList3 = Chicken::where('farm_id',3)
        ->get();
        $docList4 = Chicken::where('farm_id',4)
        ->get();

        if(auth()->user()->role ==1){
            return view('admin/doc/allDoc')->with('docList1', $docList1)->with('docList2', $docList2)->with('docList3', $docList3)->with('docList4', $docList4)->with('farm1',$farm1)->with('house1', $house1)->with('farm2',$farm2)->with('house2', $house2)->with('farm3',$farm3)->with('house3', $house3)->with('farm4',$farm4)->with('house4', $house4)->with('flock', $flock);
        }
        else{
            if(auth()->user()->farm_id ==1){
                return view('manager/doc/allDoc')->with('docList', $docList1)->with('farm',$farm1)->with('house', $house1)->with('flock', $flock);
            }
            else if(auth()->user()->farm_id ==2){
                return view('manager/doc/allDoc')->with('docList', $docList2)->with('farm',$farm2)->with('house', $house2)->with('flock', $flock);

            }
            else if(auth()->user()->farm_id ==3){
                return view('manager/doc/allDoc')->with('docList', $docList3)->with('farm',$farm3)->with('house', $house3)->with('flock', $flock);

            }
            else if(auth()->user()->farm_id ==4){
                return view('manager/doc/allDoc')->with('docList', $docList4)->with('farm',$farm4)->with('house', $house4)->with('flock', $flock);

            }
        }
        
    }

    function addDoc(Request $req){
        $data = new Chicken;
        $data->date = $req->input('date');
        $data->farm_id=$req->input('farm_id');
        $data->house_id=$req->input('house_id');
        $data->first_doc=$req->input('sum_of_doc');
        $data->sum_of_doc=$req->input('sum_of_doc');
        $data->hatchery=$req->input('hatchery');
        $data->bird_in_case=$req->input('bird_in_case');
        $data->vaccine=implode(",", $req->input('vaccine'));
        $data->density=$req->input('density');
        $data->catching_start=$req->input('catching_start');
        $data->catching_end=$req->input('catching_end');
        $data->flock_id=$req->input('flock_id');
        $data->status = 1;
        $data->save();

        $req->session()->flash('status','New DOC added successfully');
        return redirect()->back();
    }

    function getChicken(){

        $chickenList1 = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('MAX(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection')
        )
        ->groupBy('chickens.id')
        ->where('chickens.farm_id',1)
        ->get();

        $chickenList2 = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('AVG(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection')
        )
        ->groupBy('chickens.id')
        ->where('chickens.farm_id',2)
        ->get();

        $chickenList3 = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('AVG(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection')
        )
        ->groupBy('chickens.id')
        ->where('chickens.farm_id',3)
        ->get();

        $chickenList4 = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('AVG(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection')
        )
        ->groupBy('chickens.id')
        ->where('chickens.farm_id',4)
        ->get();
        
        if(auth()->user()->role ==1){
        return view('admin/chicken/allChicken')->with('chickenList1', $chickenList1)->with('chickenList2', $chickenList2)->with('chickenList3', $chickenList3)->with('chickenList4', $chickenList4);
        }
        else{
             if(auth()->user()->farm_id ==1){
                return view('manager/chicken/allChicken')->with('chickenList', $chickenList1);
             }
             elseif(auth()->user()->farm_id ==2){
                return view('manager/chicken/allChicken')->with('chickenList', $chickenList2);
             }
             elseif(auth()->user()->farm_id ==3){
                return view('manager/chicken/allChicken')->with('chickenList', $chickenList3);
             }
             elseif(auth()->user()->farm_id ==4){
                return view('manager/chicken/allChicken')->with('chickenList', $chickenList4);
             }
             

        }
    }

    function getHouseChicken(){
        $dailyList1 = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
        ->where('chickens.farm_id',1)
        ->where('daily_chickens.status',1)
        ->get();

        $dailyList2 = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
        ->where('chickens.farm_id',2)
        ->where('daily_chickens.status',1)
        ->get();

        $dailyList3 = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
        ->where('chickens.farm_id',3)
        ->where('daily_chickens.status',1)
        ->get();

        $dailyList4 = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
        ->where('chickens.farm_id',4)
        ->where('daily_chickens.status',1)
        ->get();
        
        if(auth()->user()->role ==1){
        return view('admin/chicken/dailyChicken')->with('dailyList1', $dailyList1)->with('dailyList2', $dailyList2)->with('dailyList3', $dailyList3)->with('dailyList4', $dailyList4);
        }
        else{
            if(auth()->user()->farm_id ==1){
                return view('manager/chicken/dailyChicken')->with('dailyList', $dailyList1);
             }
             elseif(auth()->user()->farm_id ==2){
                return view('manager/chicken/dailyChicken')->with('dailyList', $dailyList2);
             }
             elseif(auth()->user()->farm_id ==3){
                return view('manager/chicken/dailyChicken')->with('dailyList', $dailyList3);
             }
             elseif(auth()->user()->farm_id ==4){
                return view('manager/chicken/dailyChicken')->with('dailyList', $dailyList4);
             }
        }
    }


    function getAddChickenData($slug){
        $chicken=Chicken::find($slug);
        return response()->json([
            'status'=>200,
            'chicken'=>$chicken,
        ]);
    }

    function addDailyChicken(Request $req){

        $validated = $req->validate([
        'chicken_id' => 'required',
        'feed_consumption' => 'required',
        'weight1' => 'required',
        'weight2' => 'required',
        'weight3' => 'required',
        'weight4' => 'required',
        ]);

        $chicken = $req->input('chicken_id');

        $weight = ($req->input('weight1')+$req->input('weight2')+$req->input('weight3')+$req->input('weight4'))/48;

        //retrive previous data
        $chickenList = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('MAX(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection')
        )
        ->groupBy('chickens.id')
        ->where('chickens.id',$chicken)
        ->get()->first();

        if($chickenList){
            $weight_gain = $weight - $chickenList['avg_weight'];
            $total_chicken = $chickenList['sum_of_doc']-$chickenList['sum_of_mortality']-$chickenList['sum_of_rejection'];
            $fcr = ($req->input('feed_consumption')/$total_chicken)/$weight_gain;
        }
        else{
            $weight_gain = 0;
            $total_chicken = 0;
            $fcr = 0;
        }

        $data = new Daily_chicken;
        $data->date = $req->input('date');
        $data->chicken_id=$req->input('chicken_id');
        $data->feed_consumption=$req->input('feed_consumption');
        $data->fcr= $fcr;
        $data->weight1=$req->input('weight1');
        $data->weight2=$req->input('weight2');
        $data->weight3=$req->input('weight3');
        $data->weight4=$req->input('weight4');
        $data->weight_avg= $weight;
        $data->mortality=$req->input('mortality');
        $data->rejection=$req->input('rejection');
        $data->status = 1;
        $data->save();

        $total = Total_feed::where('farm_id', $req->input('farm_id'))->first();
            $total->amount -= $req->input('feed_consumption');
            $total->save();

        $req->session()->flash('status','New Daily data added successfully');
        return redirect()->back();
    }
}