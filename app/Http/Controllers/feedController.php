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
        $data = new Feed;
        $data->date = $req->input('date');
        $data->farm_id=$req->input('farm_id');
        $data->amount=$req->input('amount');
        $data->brand=$req->input('brand');
        $data->price=$req->input('price');
        $data->save();

        $total = Total_feed::where('farm_id', $req->input('farm_id'))->first();
            $total->amount += $req->input('amount');
            $total->save();

        $req->session()->flash('status','New Feed added successfully');
        return redirect()->back();
    }

}