<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chicken;
use App\Models\Daily_chicken;
use App\Models\Expense_sector;
use App\Models\Expense_type;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;
use App\Models\Feed;
use Illuminate\Support\Facades\DB;

class accountController extends Controller
{
    //
    function getAddExpense(){

       $farmList = Farm::all();
       $houseList = House::all();
       $sectorList = Expense_sector::all();
       $typeList = Expense_type::all();

       $feedList = Feed::select('feeds.*',
        DB::raw('SUM(feeds.amount) AS sum_of_amount')
        )
        ->groupBy('feeds.farm_id')
        ->get();
       
        return view('admin/account/addExpense')->with('farmList', $farmList)->with('houseList', $houseList)
        ->with('sectorList', $sectorList)->with('typeList', $typeList);
    }

    function getRestockFeed(){

       $feedList = Feed::all();
       
        return view('admin/Feed/feedRestock')->with('feedList', $feedList);
    }

    function addFeed(Request $req){
        $data = new Feed;
        $data->date = $req->input('date');
        $data->farm_id=$req->input('farm_id');
        $data->amount=$req->input('amount');
        $data->brand=$req->input('brand');
        $data->price=$req->input('price');
        $data->save();

        $req->session()->flash('status','New Feed added successfully');
        return redirect()->back();
    }
}