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

    //     $flock = Flock::where('status',1)
    //     ->first();

    //     $currentFlock = $flock['id'];

    //    $expenseList = Expense::where('flock_id',$currentFlock)
    //    ->get();
       
        return view('admin/sales/allSale');
    }

    function getDailySale(){

    //     $flock = Flock::where('status',1)
    //     ->first();

    //     $currentFlock = $flock['id'];

    //    $expenseList = Expense::where('flock_id',$currentFlock)
    //    ->get();
       
        return view('admin/sales/dailySale');
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