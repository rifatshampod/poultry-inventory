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

       $farmList = Farm::all();
       $houseList = House::all();
    //    $sectorList = Expense_sector::all();
    //    $typeList = Expense_type::all();
    //     $flockList = Flock::where('status',1)
    //     ->first();
       
        return view('admin/sales/addSale')->with('farmList', $farmList)->with('houseList', $houseList);
    }

    function getSale(){

        $saleList1 = Sale::select('sales.*',
        DB::raw('SUM(sales.total_birds) AS sum_of_birds'),
        DB::raw('SUM(sales.total_weight) AS sum_of_weight'),
        DB::raw('SUM(sales.total_price) AS sum_of_price'),
        DB::raw('AVG(sales.avg_weight) AS avg_of_weight'),
        DB::raw('AVG(sales.avg_price) AS avg_of_price'),
        DB::raw('AVG(sales.per_kg_price) AS avg_kg_price'),
        )
        ->where('farm_id',1)
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
        ->groupBy('sales.farm_id')
        ->get();

       
        return view('admin/sales/allSale')->with('saleList1', $saleList1)->with('saleList2', $saleList2)->with('saleList3', $saleList3)->with('saleList4', $saleList4);
    }

    function getDailySale(){

        $soldList1 = Sale::where('farm_id',1)->get();
        $soldList2 = Sale::where('farm_id',2)->get();
        $soldList3 = Sale::where('farm_id',3)->get();
        $soldList4 = Sale::where('farm_id',4)->get();
       
        return view('admin/sales/dailySale')->with('soldList1', $soldList1)->with('soldList2', $soldList2)->with('soldList3', $soldList3)->with('soldList4', $soldList4);
    }

    function addSale(Request $req){

        $totalBirds = $req->input('total_birds');
        $totalWeight = $req->input('total_weight');
        $totalPrice = $req->input('total_price');

        $avgWeight = $totalWeight/$totalBirds;
        $avgPrice = $totalPrice/$totalBirds;
        $perkgPrice = $totalPrice/$totalWeight;


        $data = new Sale;
        $data->date = $req->input('date');
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
            ->where('house_id', $req->input('house_id'))->first();
            $total->sum_of_doc -= $req->input('total_birds');
            $total->save();
        

        $req->session()->flash('status','New Sale data added successfully');
        return redirect('all-sale');
    }
}