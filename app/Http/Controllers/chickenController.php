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

        $flock1 = Flock::where('status',1)
        ->where('farm_id', 1)
        ->get()->first();
        $flock2 = Flock::where('status',1)
        ->where('farm_id', 2)
        ->get()->first();
        $flock3 = Flock::where('status',1)
        ->where('farm_id', 3)
        ->get()->first();
        $flock4 = Flock::where('status',1)
        ->where('farm_id', 4)
        ->get()->first();

        $docList1 = Chicken::where('farm_id',1)
        ->where('status', 1)
        ->get();
        $docList2 = Chicken::where('farm_id',2)
        ->where('status', 1)
        ->get();
        $docList3 = Chicken::where('farm_id',3)
        ->where('status', 1)
        ->get();
        $docList4 = Chicken::where('farm_id',4)
        ->where('status', 1)
        ->get();

        if(auth()->user()->role ==1){
            return view('admin/doc/allDoc')->with('docList1', $docList1)->with('docList2', $docList2)->with('docList3', $docList3)->with('docList4', $docList4)->with('farm1',$farm1)->with('house1', $house1)->with('farm2',$farm2)->with('house2', $house2)->with('farm3',$farm3)->with('house3', $house3)->with('farm4',$farm4)->with('house4', $house4)->with('flock1', $flock1)->with('flock2', $flock2)->with('flock3', $flock3)->with('flock4', $flock4);
        }
        else{
            if(auth()->user()->farm_id ==1){
                return view('manager/doc/allDoc')->with('docList', $docList1)->with('farm',$farm1)->with('house', $house1)->with('flock', $flock1);
            }
            else if(auth()->user()->farm_id ==2){
                return view('manager/doc/allDoc')->with('docList', $docList2)->with('farm',$farm2)->with('house', $house2)->with('flock', $flock2);

            }
            else if(auth()->user()->farm_id ==3){
                return view('manager/doc/allDoc')->with('docList', $docList3)->with('farm',$farm3)->with('house', $house3)->with('flock', $flock3);

            }
            else if(auth()->user()->farm_id ==4){
                return view('manager/doc/allDoc')->with('docList', $docList4)->with('farm',$farm4)->with('house', $house4)->with('flock', $flock4);

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
        if($req->input('vaccine')){         //validation
            $data->vaccine=implode(",", $req->input('vaccine'));
        }
        $data->flock_id=$req->input('flock_id');
        $data->status = 1;
        $data->save();

        $req->session()->flash('status','New DOC added successfully');
        return redirect()->back();
    }

    function getEditDoc($id){
        $doc=Chicken::find($id);
        return response()->json([
            'status'=>200,
            'chicken'=>$doc,
        ]);
    }

    function updateDoc(Request $req){

        $data = $req->validate([
            'chicken_id' => 'required',
            'sum_of_doc' => 'required',
        ]);
        $chicken_id = $req->input('chicken_id');

        $oldSum = Chicken::where('id','=', $chicken_id)->get('first_doc')->first();
        $sumDifference = $req->input('sum_of_doc') - $oldSum['first_doc'];


            $doc = Chicken::find($chicken_id);
            $doc->house_id = $req->input('house_id');
            $doc->date=$req->input('date');
            $doc->first_doc=$req->input('sum_of_doc');
            $doc->sum_of_doc+=$sumDifference;
            $doc->hatchery=$req->input('hatchery');
            $doc->update();

        return redirect()->back();
    }

    function getChicken(){
        $farm1 = Farm::where('id',1)
        ->first();

        $farm2 = Farm::where('id',2)
        ->first();

        $farm3 = Farm::where('id',3)
        ->first();

        $farm4 = Farm::where('id',4)
        ->first();

        $flock1 = Flock::where('status',1)
        ->where('farm_id', 1)
        ->get()->first();
        $flock2 = Flock::where('status',1)
        ->where('farm_id', 2)
        ->get()->first();
        $flock3 = Flock::where('status',1)
        ->where('farm_id', 3)
        ->get()->first();
        $flock4 = Flock::where('status',1)
        ->where('farm_id', 4)
        ->get()->first();

        $chickenList1 = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('AVG(daily_chickens.mortality) AS avg_of_mortality'),
        DB::raw('MAX(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection')
        )
        ->groupBy('chickens.id')
        ->where('chickens.farm_id',1)
        ->where('chickens.status', 1)
        ->get();

        $chickenList2 = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('AVG(daily_chickens.mortality) AS avg_of_mortality'),
        DB::raw('AVG(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection')
        )
        ->groupBy('chickens.id')
        ->where('chickens.farm_id',2)
        ->where('chickens.status', 1)
        ->get();

        $chickenList3 = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('AVG(daily_chickens.mortality) AS avg_of_mortality'),
        DB::raw('AVG(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection')
        )
        ->groupBy('chickens.id')
        ->where('chickens.farm_id',3)
        ->where('chickens.status', 1)
        ->get();

        $chickenList4 = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('AVG(daily_chickens.mortality) AS avg_of_mortality'),
        DB::raw('AVG(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection')
        )
        ->groupBy('chickens.id')
        ->where('chickens.farm_id',4)
        ->where('chickens.status', 1)
        ->get();
        
        if(auth()->user()->role ==1){
        return view('admin/chicken/allChicken')->with('chickenList1', $chickenList1)->with('chickenList2', $chickenList2)->with('chickenList3', $chickenList3)->with('chickenList4', $chickenList4)->with('farm1', $farm1)->with('farm2', $farm2)->with('farm3', $farm3)->with('farm4', $farm4)->with('flock1', $flock1)->with('flock2', $flock2)->with('flock3', $flock3)->with('flock4', $flock4);
        }
        else{
             if(auth()->user()->farm_id ==1){
                return view('manager/chicken/allChicken')->with('chickenList', $chickenList1)->with('flock', $flock1);
             }
             elseif(auth()->user()->farm_id ==2){
                return view('manager/chicken/allChicken')->with('chickenList', $chickenList2)->with('flock', $flock2);
             }
             elseif(auth()->user()->farm_id ==3){
                return view('manager/chicken/allChicken')->with('chickenList', $chickenList3)->with('flock', $flock3);
             }
             elseif(auth()->user()->farm_id ==4){
                return view('manager/chicken/allChicken')->with('chickenList', $chickenList4)->with('flock', $flock4);
             }
            
        }
    }

    function getHouseChicken(){

        $farm1 = Farm::where('id',1)
        ->first();

        $farm2 = Farm::where('id',2)
        ->first();

        $farm3 = Farm::where('id',3)
        ->first();

        $farm4 = Farm::where('id',4)
        ->first();
        
        $dailyList1 = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
        ->where('chickens.farm_id',1)
        ->where('chickens.status', 1)
        ->where('daily_chickens.status',1)
        ->orderBy('daily_chickens.id','DESC')
        ->select('daily_chickens.*', 'chickens.house_id')
        ->get();

        $dailyList2 = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
        ->where('chickens.farm_id',2)
        ->where('chickens.status', 1)
        ->where('daily_chickens.status',1)
        ->select('daily_chickens.*', 'chickens.house_id')
        ->orderBy('daily_chickens.id','DESC')
        ->get();

        $dailyList3 = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
        ->where('chickens.farm_id',3)
        ->where('chickens.status', 1)
        ->where('daily_chickens.status',1)
        ->select('daily_chickens.*', 'chickens.house_id')
        ->orderBy('daily_chickens.id','DESC')
        ->get();

        $dailyList4 = Daily_chicken::join('chickens','chickens.id','=','daily_chickens.chicken_id')
        ->where('chickens.farm_id',4)
        ->where('chickens.status', 1)
        ->where('daily_chickens.status',1)
        ->select('daily_chickens.*', 'chickens.house_id')
        ->orderBy('daily_chickens.id','DESC')
        ->get();
        
        if(auth()->user()->role ==1){
        return view('admin/chicken/dailyChicken')->with('dailyList1', $dailyList1)->with('dailyList2', $dailyList2)->with('dailyList3', $dailyList3)->with('dailyList4', $dailyList4)->with('farm1', $farm1)->with('farm2', $farm2)->with('farm3', $farm3)->with('farm4', $farm4);
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

        $fcr = 0;

        $chicken = $req->input('chicken_id');

        $weight = ($req->input('weight1')+$req->input('weight2')+$req->input('weight3')+$req->input('weight4'))/48000;

        //retrive previous data
        $chickenList = Chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('MAX(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('MAX(daily_chickens.cfc) AS last_cfc'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection')
        )
        ->groupBy('chickens.id')
        ->where('chickens.id',$chicken)
        ->get()->first();

        if($chickenList){
            $weight_gain = $weight - $chickenList['avg_weight'];
            $total_chicken = $chickenList['sum_of_doc']-$chickenList['sum_of_mortality']-$chickenList['sum_of_rejection'];
            //$fcr += ($req->input('feed_consumption')/$total_chicken)/$weight_gain;
            $avg_gain = $weight_gain / $total_chicken ; 
            $avg_feed_consumption = $req->input('feed_consumption')/$total_chicken;
            $cfc = $chickenList['last_cfc'] + $avg_feed_consumption ; 
            $fcr = $cfc/$weight;
            $fc = ($req->input('feed_consumption')/$total_chicken)/$weight_gain;
        }
        else{
            $weight_gain = 0;
            $total_chicken = 0;
            $fcr = 0;
            $fc = 0;
            $avg_gain = 0;
            $avg_feed_consumption = $req->input('feed_consumption')/$total_chicken;
        }

        $total = Total_feed::where('farm_id', $req->input('farm_id'))->first();
            
        
        if($total){

            $feedStock = $total['amount']-$req->input('feed_consumption');

            if($feedStock<=0){
                $req->session()->flash('error','Feed stock is lowar than feed consumption. Please add feed amount first.');
            }
            else{
                $total->amount -= $req->input('feed_consumption');
                $total->save();

                $data = new Daily_chicken;
                $data->date = $req->input('date');
                $data->chicken_id=$req->input('chicken_id');
                $data->feed_consumption=$req->input('feed_consumption');
                $data->avg_feed_consumption=$avg_feed_consumption;
                $data->cfc= $cfc;
                $data->fcr= $fcr;
                $data->fc= $fc;
                $data->weight1=$req->input('weight1')/1000;
                $data->weight2=$req->input('weight2')/1000;
                $data->weight3=$req->input('weight3')/1000;
                $data->weight4=$req->input('weight4')/1000;
                $data->weight_avg= $weight;
                $data->weight_gain= $weight_gain;
                $data->mortality=$req->input('mortality');
                $data->rejection=$req->input('rejection');
                $data->status = 1;
                $data->save();

                $req->session()->flash('status','New Daily data added successfully. FCR value= '.$fcr.' and cfc value = '.$cfc.' and previous weight gain = '.$weight_gain);
            }

            

        }
        else{
            $req->session()->flash('error','No Feed added for this farm. Please add feed amount first.');
        }
        return redirect()->back();
    }

    //edit daily chicken data
    function getEditDailyChicken($id){
        $daily=Daily_chicken::find($id);
        return response()->json([
            'status'=>200,
            'daily'=>$daily,
        ]);
    }

    function updateDailyChicken(Request $req){
       
       $fcr = 0;

        $chicken = $req->input('chicken_id');
        $daily_id = $req->input('daily_id');

        $previousDaily = Daily_chicken::where('chicken_id', $chicken)
        ->where('id','<=', $daily_id)->orderBy('id', 'desc')->skip(1)->first();

        $weight = ($req->input('weight1')+$req->input('weight2')+$req->input('weight3')+$req->input('weight4'))/48000;


        if($previousDaily){
        //retrive previous data
        $chickenList = Chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('MAX(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('MAX(daily_chickens.cfc) AS last_cfc'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection')
        )
        ->groupBy('chickens.id')
        ->where('chickens.id',$chicken)
        ->where('daily_chickens.id', $previousDaily['id'])
        ->get()->first();

        
            $weight_gain = $weight-$chickenList['avg_weight'];
            $total_chicken = $chickenList['sum_of_doc']-$chickenList['sum_of_mortality']-$chickenList['sum_of_rejection'];
            //$fcr += ($req->input('feed_consumption')/$total_chicken)/$weight_gain;
            $avg_gain = $weight_gain / $total_chicken ; 
            $avg_feed_consumption = $req->input('feed_consumption')/$total_chicken;
            $cfc = $chickenList['last_cfc'] + $avg_feed_consumption ; 
            $fcr = $cfc/$weight;
            $fc = ($req->input('feed_consumption')/$total_chicken)/$weight_gain;


            //retrieve previous total

        $farm = $chickenList['farm_id'];
        $difference = $chickenList['feedBefore'] - $req->input('feed_consumption');
        
        $total = Total_feed::where('farm_id', $farm)->first();
        $total->amount += $difference;
        $total->save();
        }
        else{
            $weight_gain = 0;
            $total_chicken = 1;
            $fcr = 0;
            $cfc = 0;
            $fc = 0;
            $avg_gain = 0;
            $avg_feed_consumption = 0;
        }
        
        

            $data = Daily_chicken::find($daily_id);
            $data->date = $req->input('date');
            $data->chicken_id=$req->input('chicken_id');
            $data->feed_consumption=$req->input('feed_consumption');
            $data->avg_feed_consumption=$avg_feed_consumption;
            $data->cfc= $cfc;
            $data->fcr= $fcr;
            $data->fc= $fc;
            $data->weight1=$req->input('weight1')/1000;
            $data->weight2=$req->input('weight2')/1000;
            $data->weight3=$req->input('weight3')/1000;
            $data->weight4=$req->input('weight4')/1000;
            $data->weight_avg= $weight;
            $data->weight_gain= $weight_gain;
            $data->mortality=$req->input('mortality');
            $data->rejection=$req->input('rejection');
        
        $data->update();

        return redirect()->back();
    }
}