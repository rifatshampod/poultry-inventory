<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Farm;
use App\Models\Farm_medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class medicineController extends Controller
{
    //

    function getMedicine(){

    $medicineList = Medicine::all();
       
        return view('admin/medicine/allMedicine')->with('medicineList', $medicineList);
    }

    function getHouseMedicine($slug){

    $farmList = Farm::all();
    $medicineList = Medicine::all();
    $farmMedicine = Farm_medicine::where('medicine_id', $slug)
    ->select('farm_medicines.*',
        DB::raw('SUM(farm_medicines.amount) AS sum_of_amount')
        )
        ->groupBy('farm_medicines.farm_id')
    ->get();
       
        return view('admin/medicine/allHouseMedicine')->with('farmList', $farmList)->with('farmMedicine',$farmMedicine)->with('medicineList', $medicineList);
    }

    function addMedicine(Request $req){
        
        $data = new Medicine;
        $data->name = $req->input('name');
        $data->usages=$req->input('usages');
        $data->save();
        
        $req->session()->flash('status','New Medicine added successfully');
        return redirect()->back();
    }

    function addFarmMedicine(Request $req){

        $amount = 0;

        if($req->input('data_type')==2){
            $amount = -($req->input('amount'));
        }
        else{
            $amount = $req->input('amount');
        }
        
        $data = new Farm_medicine;
        $data->medicine_id = $req->input('medicine_id');
        $data->farm_id=$req->input('farm_id');
        $data->date=$req->input('date');
        $data->amount=$amount;
        $data->price=$req->input('price');
        $data->save();
        
        $req->session()->flash('status','New Medicine added successfully');
        return redirect()->back();
    }

    function getDistribution(Request $req){
        $medicineList = Farm_medicine::orderBy('id','desc')
        ->get();
       
        return view('admin/medicine/medicineDistribution')->with('medicineList', $medicineList);
    }
}