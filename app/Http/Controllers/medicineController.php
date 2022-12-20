<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class medicineController extends Controller
{
    //

    function getMedicine(){

    //    $farmList = Farm::all();

    //    $feedListCount = Feed::select('feeds.*',
    //     DB::raw('SUM(feeds.amount) AS sum_of_amount')
    //     )
    //     ->groupBy('feeds.farm_id')
    //     ->get();

    //     $feedList = Total_feed::all();
       
        return view('admin/medicine/allMedicine');
    }

    function addMedicine(Request $req){
        // $data = new Feed;
        // $data->date = $req->input('date');
        // $data->farm_id=$req->input('farm_id');
        // $data->amount=$req->input('amount');
        // $data->brand=$req->input('brand');
        // $data->price=$req->input('price');
        // $data->save();

        // $total = Total_feed::where('farm_id', $req->input('farm_id'))->first();
        //     $total->amount += $req->input('amount');
        //     $total->save();

        $req->session()->flash('status','New Feed added successfully');
        return redirect()->back();
    }

    function distributeMedicine(Request $req){

    }
}