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

    $medicineList = Medicine::where('status',1)->get();
       
        return view('admin/medicine/allMedicine')->with('medicineList', $medicineList);
    }

    function getHouseMedicine($slug){

        $userRole = auth()->user()->role;
        $userFarm = auth()->user()->farm_id;

        $medicineList = Medicine::where('status',1)->get();
        $medicineName = Medicine::find($slug);

        if($userRole==1){
            $farmList = Farm::all();
            $farmMedicine = Farm_medicine::where('medicine_id', $slug)
                            ->select('farm_medicines.*',
                                DB::raw('SUM(farm_medicines.amount) AS sum_of_amount')
                                )
                                ->groupBy('farm_medicines.farm_id')
                            ->get();
        }
        else{

            $farmList = Farm::where('id', $userFarm)
            ->get();
            $farmMedicine = Farm_medicine::where('medicine_id', $slug)
                            ->select('farm_medicines.*',
                                DB::raw('SUM(farm_medicines.amount) AS sum_of_amount')
                                )
                            ->groupBy('farm_medicines.farm_id')
                            ->where('farm_medicines.farm_id', $userFarm)
                            ->get();

        }

        return view('admin/medicine/allHouseMedicine')->with('farmList', $farmList)->with('farmMedicine',$farmMedicine)->with('medicineList', $medicineList)->with('medicineName', $medicineName);
    }

    function addMedicine(Request $req){
        
        $data = new Medicine;
        $data->name = $req->input('name');
        $data->usages=$req->input('usages');
        $data->status=1;
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
        // $data->price=$req->input('price');
        $data->save();
        
        $req->session()->flash('status','New Medicine added successfully');
        return redirect()->back();
    }

    function getDistribution(Request $req){
       

        $loggedFarm = auth()->user()->farm_id ;

        if(auth()->user()->role ==1){
            
            $farmList = Farm::all();
            $medicineList = Farm_medicine::orderBy('id','desc')
            ->get();
            $medicineTypeList = Medicine::orderBy('id','desc')
            ->where('status',1)->get();

            
        }
        else{
           
            $farmList = Farm::where('id', $loggedFarm)
            ->get();
            $medicineList = Farm_medicine::orderBy('id','desc')
            ->where('farm_id', $loggedFarm)
            ->get();
            $medicineTypeList = Medicine::orderBy('id','desc')
            ->where('status',1)->get();
            
        }
       
        return view('admin/medicine/medicineDistribution')->with('medicineList', $medicineList)->with('medicineTypeList', $medicineTypeList)->with('farmList', $farmList);
    }

    function getAddDistribution(){

        $userRole = auth()->user()->role;
        $userFarm = auth()->user()->farm_id;

        $medicineList = Medicine::where('status',1)->get();

        if($userRole==1){
            $farmList = Farm::all();
            $farmMedicine = Farm_medicine::select('farm_medicines.*',
                                DB::raw('SUM(farm_medicines.amount) AS sum_of_amount')
                                )
                                ->groupBy('farm_medicines.farm_id')
                                ->groupBy('farm_medicines.medicine_id')
                            ->get();
        }
        else{

            $farmList = Farm::where('id', $userFarm)
            ->get();
            $farmMedicine = Farm_medicine::select('farm_medicines.*',
                                DB::raw('SUM(farm_medicines.amount) AS sum_of_amount')
                                )
                            ->groupBy('farm_medicines.farm_id')
                            ->groupBy('farm_medicines.medicine_id')
                            ->where('farm_medicines.farm_id', $userFarm)
                            ->get();

        }

        return view('admin/medicine/addDistributeMedicine')->with('farmList', $farmList)->with('farmMedicine',$farmMedicine)->with('medicineList', $medicineList);
    }

    //edit medicine restock
    function getEditMedicineDistribution($id){
        $data=Farm_medicine::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data,
        ]);
    }

    

    function updateMedicineDistribution(Request $req){

       
        $distribution = $req->input('distribution_id');
        
        //Retrieve previous data

        $data = Farm_medicine::find($distribution);
        $data->date = $req->input('date');
        $data->farm_id=$req->input('farm_id');
        $data->medicine_id=$req->input('medicine_id');
        $data->amount=$req->input('amount');
        // $data->price=$req->input('price');
        $data->update();

        //Change total

        // $difference = $req->input('amount')-$req->input('previous_amount');
        // $farm = $req->input('farm_id');

        // $total = Total_feed::where('farm_id', $farm)->first();
        // $total->amount += $difference;
        // $total->save();

        $req->session()->flash('status', 'Feed restock data updated successfully.');
        return redirect()->back();
    }

    //edit medicine type
    function getEditMedicineType($id){
        $data=Medicine::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data,
        ]);
    }
    function updateMedicine(Request $req){

       
        $medicine = $req->input('medicine_id');
        
        //Retrieve previous data

        $data = Medicine::find($medicine);
        $data->name = $req->input('name');
        $data->usages=$req->input('usages');
        $data->update();

        $req->session()->flash('status', 'Medicine type updated successfully.');
        return redirect()->back();
    }

    function deleteMedicine(Request $req){

       
        $medicine = $req->input('medicine_id');
        
        //Retrieve previous data

        $data = Medicine::find($medicine);
        $data->status=0;
        $data->update();

        $req->session()->flash('status', 'Medicine deleted successfully.');
        return redirect()->back();
    }
}