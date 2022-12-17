<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chicken;
use App\Models\Daily_chicken;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;
use Illuminate\Support\Facades\DB;

class feedController extends Controller
{
    //
    function getFeed(){

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

        $flock = Flock::where('status',1)
        ->first();

        $docList1 = Chicken::where('farm_id',1)
        ->get();
        $docList2 = Chicken::where('farm_id',2)
        ->get();
        $docList3 = Chicken::where('farm_id',3)
        ->get();
        $docList4 = Chicken::where('farm_id',4)
        ->get();

        return view('admin/Feed/allFeed')->with('docList1', $docList1)->with('docList2', $docList2)->with('docList3', $docList3)->with('docList4', $docList4)->with('farm1',$farm1)->with('house1', $house1)->with('farm2',$farm2)->with('house2', $house2)->with('farm3',$farm3)->with('house3', $house3)->with('farm4',$farm4)->with('house4', $house4)->with('flock', $flock);
    }

    function addFeed(Request $req){
        $data = new Chicken;
        $data->date = $req->input('date');
        $data->farm_id=$req->input('farm_id');
        $data->house_id=$req->input('house_id');
        $data->sum_of_doc=$req->input('sum_of_doc');
        $data->hatchery=$req->input('hatchery');
        $data->bird_in_case=$req->input('bird_in_case');
        $data->vaccine=implode(",", $req->input('vaccine'));
        $data->density=$req->input('density');
        $data->catching_start=$req->input('catching_start');
        $data->catching_end=$req->input('catching_end');
        $data->flock_id=$req->input('flock_id');
        $data->status = 1;
        $data->save();

        $req->session()->flash('status','New DOC added successfully');
        return redirect()->back();
    }

}