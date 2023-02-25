<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chicken;
use App\Models\Daily_chicken;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;
use App\Models\Feed;
use App\Models\Total_feed;
use Illuminate\Support\Facades\DB;

class feedController extends Controller
{
    //
    function getFeed(){

       $farmList = Farm::all();

       $feedListCount = Feed::select('feeds.*',
        DB::raw('SUM(feeds.amount) AS sum_of_amount')
        )
        ->groupBy('feeds.farm_id')
        ->get();

        $feedList = Total_feed::all();
       
        return view('admin/Feed/allFeed')->with('farmList', $farmList)->with('feedList', $feedList);
    }

    function getRestockFeed(){

       $feedList = Feed::all();
       
        return view('admin/Feed/feedRestock')->with('feedList', $feedList);
    }

    function addFeed(Request $req){

        $totalPrice = 0;
        if($req->input('price')){
            $totalPrice = $req->input('amount') * $req->input('price');
        }
        
        $data = new Feed;
        $data->date = $req->input('date');
        $data->farm_id=$req->input('farm_id');
        $data->amount=$req->input('amount');
        $data->brand=$req->input('brand');
        $data->price=$totalPrice;
        $data->save();

        $total = Total_feed::where('farm_id', $req->input('farm_id'))->first();
        if($total){
            $total->amount += $req->input('amount');
            $total->save();
        }
        else{
            $feedTotal = new Total_feed;
            $feedTotal->farm_id = $req->input('farm_id');
            $feedTotal->amount = $req->input('amount');
            $feedTotal->save();
        }
            
        $req->session()->flash('status','New Feed added successfully');
        return redirect()->back();
    }

}