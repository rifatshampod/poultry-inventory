<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Farm;
use Illuminate\Http\Request;

class medicineController extends Controller
{
    //

    function getMedicine(){

    $medicineList = Medicine::all();
       
        return view('admin/medicine/allMedicine')->with('medicineList', $medicineList);
    }

    function getHouseMedicine(){

    // $medicineList = Medicine::all();
    $farmList = Farm::all();
       
        return view('admin/medicine/allHouseMedicine')->with('farmList', $farmList);
    }

    function addMedicine(Request $req){
        
        $data = new Medicine;
        $data->name = $req->input('name');
        $data->usages=$req->input('usages');
        $data->save();
        
        $req->session()->flash('status','New Medicine added successfully');
        return redirect()->back();
    }

    function distributeMedicine(Request $req){

    }
}