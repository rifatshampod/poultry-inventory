<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chicken;
use App\Models\Daily_chicken;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;
use App\Models\Sale;
use App\Models\Total_feed;
use Illuminate\Support\Facades\DB;

class saleController extends Controller
{
    //
    function getAddSale(){

       $loggedFarm = auth()->user()->farm_id ; 

        if(auth()->user()->role ==1){
            $farmList = Farm::all();
            $houseList = House::all();
        }
        else{
            $farmList = Farm::where('id', $loggedFarm)
            ->get();
            $houseList = House::where('farm_id', $loggedFarm)
            ->get();
        }
       
        return view('admin/sales/addSale')->with('farmList', $farmList)->with('houseList', $houseList);
    }

    function getSale(){

        $flock1id = 0;
        $flock2id = 0;
        $flock3id = 0;
        $flock4id = 0;

        $flock1 = Flock::where('farm_id',1)->where('status',1)->get()->first();
        $flock2 = Flock::where('farm_id',2)->where('status',1)->get()->first();
        $flock3 = Flock::where('farm_id',3)->where('status',1)->get()->first();
        $flock4 = Flock::where('farm_id',4)->where('status',1)->get()->first();

        if($flock1){$flock1id=$flock1['id'];}
        if($flock2){$flock2id=$flock2['id'];}
        if($flock3){$flock3id=$flock3['id'];}
        if($flock4){$flock4id=$flock4['id'];}

        $saleList1 = Sale::select('sales.*',
        DB::raw('SUM(sales.total_birds) AS sum_of_birds'),
        DB::raw('SUM(sales.total_weight) AS sum_of_weight'),
        DB::raw('SUM(sales.total_price) AS sum_of_price'),
        DB::raw('AVG(sales.avg_weight) AS avg_of_weight'),
        DB::raw('AVG(sales.avg_price) AS avg_of_price'),
        DB::raw('AVG(sales.per_kg_price) AS avg_kg_price'),
        )
        ->where('farm_id',1)
        ->where('flock_id', $flock1id)
        ->groupBy('sales.farm_id')
        ->get();

        $saleList2 = Sale::select('sales.*',
        DB::raw('SUM(sales.total_birds) AS sum_of_birds'),
        DB::raw('SUM(sales.total_weight) AS sum_of_weight'),
        DB::raw('SUM(sales.total_price) AS sum_of_price'),
        DB::raw('AVG(sales.avg_weight) AS avg_of_weight'),
        DB::raw('AVG(sales.avg_price) AS avg_of_price'),
        DB::raw('AVG(sales.per_kg_price) AS avg_kg_price'),
        )
        ->where('farm_id',2)
        ->where('flock_id', $flock2id)
        ->groupBy('sales.farm_id')
        ->get();

        $saleList3 = Sale::select('sales.*',
        DB::raw('SUM(sales.total_birds) AS sum_of_birds'),
        DB::raw('SUM(sales.total_weight) AS sum_of_weight'),
        DB::raw('SUM(sales.total_price) AS sum_of_price'),
        DB::raw('AVG(sales.avg_weight) AS avg_of_weight'),
        DB::raw('AVG(sales.avg_price) AS avg_of_price'),
        DB::raw('AVG(sales.per_kg_price) AS avg_kg_price'),
        )
        ->where('farm_id',3)
        ->where('flock_id', $flock3id)
        ->groupBy('sales.farm_id')
        ->get();

        $saleList4 = Sale::select('sales.*',
        DB::raw('SUM(sales.total_birds) AS sum_of_birds'),
        DB::raw('SUM(sales.total_weight) AS sum_of_weight'),
        DB::raw('SUM(sales.total_price) AS sum_of_price'),
        DB::raw('AVG(sales.avg_weight) AS avg_of_weight'),
        DB::raw('AVG(sales.avg_price) AS avg_of_price'),
        DB::raw('AVG(sales.per_kg_price) AS avg_kg_price'),
        )
        ->where('farm_id',4)
        ->where('flock_id', $flock4id)
        ->groupBy('sales.farm_id')
        ->get();


        $farm1 = Farm::where('id',1)
        ->first();

        $farm2 = Farm::where('id',2)
        ->first();

        $farm3 = Farm::where('id',3)
        ->first();

        $farm4 = Farm::where('id',4)
        ->first();

        if(auth()->user()->role ==1){
         return view('admin/sales/allSale')->with('farm1',$farm1)->with('farm2',$farm2)->with('farm3',$farm3)->with('farm4',$farm4)->with('saleList1', $saleList1)->with('saleList2', $saleList2)->with('saleList3', $saleList3)->with('saleList4', $saleList4);
        }
        else{
            if(auth()->user()->farm_id ==1){
                return view('manager/sales/allSale')->with('saleList', $saleList1);
             }
             elseif(auth()->user()->farm_id ==2){
                return view('manager/sales/allSale')->with('saleList', $saleList2);
             }
             elseif(auth()->user()->farm_id ==3){
                return view('manager/sales/allSale')->with('saleList', $saleList3);
             }
             elseif(auth()->user()->farm_id ==4){
                return view('manager/sales/allSale')->with('saleList', $saleList4);
             }
        }

       
       
    }

    function getDailySale(){

        $soldList1 = Sale::where('farm_id',1)->get();
        $soldList2 = Sale::where('farm_id',2)->get();
        $soldList3 = Sale::where('farm_id',3)->get();
        $soldList4 = Sale::where('farm_id',4)->get();

        $farm1 = Farm::where('id',1)
        ->first();

        $farm2 = Farm::where('id',2)
        ->first();

        $farm3 = Farm::where('id',3)
        ->first();

        $farm4 = Farm::where('id',4)
        ->first();

        if(auth()->user()->role ==1){
         return view('admin/sales/dailySale')->with('farm1',$farm1)->with('farm2',$farm2)->with('farm3',$farm3)->with('farm4',$farm4)->with('soldList1', $soldList1)->with('soldList2', $soldList2)->with('soldList3', $soldList3)->with('soldList4', $soldList4);
        }
        else{
            if(auth()->user()->farm_id ==1){
                return view('manager/sales/dailySale')->with('soldList', $soldList1);
             }
             elseif(auth()->user()->farm_id ==2){
                return view('manager/sales/dailySale')->with('soldList', $soldList2);
             }
             elseif(auth()->user()->farm_id ==3){
                return view('manager/sales/dailySale')->with('soldList', $soldList3);
             }
             elseif(auth()->user()->farm_id ==4){
                return view('manager/sales/dailySale')->with('soldList', $soldList4);
             }
        }
       
        
    }

    function addSale(Request $req){

        $totalBirds = $req->input('total_birds');
        $totalWeight = $req->input('total_weight');
        $totalPrice = $req->input('total_price');

        $avgWeight = $totalWeight/$totalBirds;
        $avgPrice = $totalPrice/$totalBirds;
        $perkgPrice = $totalPrice/$totalWeight;

        $flockId = Flock::where('status',1)->where('farm_id',$req->input('farm_id'))->get()->first();

        $data = new Sale;
        $data->date = $req->input('date');
        $data->flock_id=$flockId['id'];
        $data->farm_id=$req->input('farm_id');
        $data->house_id=$req->input('house_id');
        $data->total_birds=$req->input('total_birds');
        $data->total_weight=$req->input('total_weight');
        $data->avg_weight=$avgWeight;
        $data->total_price=$req->input('total_price');
        $data->avg_price=$avgPrice;
        $data->per_kg_price=$perkgPrice;
        $data->customer=$req->input('customer');
        $data->car_no=$req->input('car_no');
        $data->catching_slip=$req->input('catching_slip');
        $data->payment_method=$req->input('payment_method');
        $data->branch=$req->input('branch');
        $data->status=1;
        $data->save();

        //reduce amount from total chicken
            $total = Chicken::where('farm_id', $req->input('farm_id'))
            ->where('status', 1)
            ->where('house_id', $req->input('house_id'))->first();
            $total->sum_of_doc -= $req->input('total_birds');
            $total->save();
        

        $req->session()->flash('status','New Sale data added successfully');
        return redirect('all-sale');
    }
}