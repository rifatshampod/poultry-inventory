<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chicken;
use App\Models\Daily_chicken;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;
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
        // $data = new Expense;
        // $data->date = $req->input('date');
        // $data->farm_id=$req->input('farm_id');
        // $data->house_id=$req->input('house_id');
        // $data->flock_id=$req->input('flock_id');
        // $data->expense_sector_id=$req->input('expense_sector_id');
        // $data->expense_type_id=$req->input('expense_type_id');
        // $data->amount=$req->input('amount');
        // $data->paid_from=$req->input('paid_from');
        // $data->approver=$req->input('approver');
        // $data->reference=$req->input('reference');
        // $data->save();

        // if($req->input('paid_from')==1){
        //     $total = Total_cash::where('farm_id', $req->input('farm_id'))->first();
        //     $total->amount -= $req->input('amount');
        //     $total->save();
        // }

        $req->session()->flash('status','New Sale added successfully');
        return redirect('all-sale');
    }
}