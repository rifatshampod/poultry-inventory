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

        $loggedFarm = auth()->user()->farm_id ; 

        if(auth()->user()->role ==1){
            $farmList = Farm::all();
            $houseList = House::all();
            $flockList = Flock::where('status',1)
            ->get();
        }
        else{
            $farmList = Farm::where('id', $loggedFarm)
            ->get();
            $houseList = House::where('farm_id', $loggedFarm)
            ->get();
            $flockList = Flock::where('status',1)
            ->where('farm_id', $loggedFarm)
            ->get();
        }

       $feedList = Feed::all();
       
        return view('admin/Feed/feedRestock')->with('feedList', $feedList)->with('farmList', $farmList)
        ->with('flockList', $flockList);
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

    //edit feed restock
    function getEditFeed($id){
        $data=Feed::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data,
        ]);
    }

    function updateFeed(Request $req){

       
        $feed = $req->input('feed_id');
        

        //Retrieve previous data

        $data = Feed::find($feed);
        $data->date = $req->input('date');
        $data->farm_id=$req->input('farm_id');
        $data->amount=$req->input('amount');
        $data->brand=$req->input('brand');
        $data->price=$req->input('price');
        $data->update();

        //Change total

        $difference = $req->input('amount')-$req->input('previous_amount');
        $farm = $req->input('farm_id');

        $total = Total_feed::where('farm_id', $farm)->first();
        $total->amount += $difference;
        $total->save();

        $req->session()->flash('status', 'Feed restock data updated successfully.');
        return redirect()->back();
    }

}