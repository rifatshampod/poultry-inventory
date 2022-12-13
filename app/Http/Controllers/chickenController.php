<?php

namespace App\Http\Controllers;

use App\Models\Chicken;
use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;

class chickenController extends Controller
{
    function getDoc(){

        $farm1 = Farm::find(1)
        ->first();

        $farm2 = Farm::find(2)
        ->get();

        $farm3 = Farm::find(3)
        ->get();

        $farm4 = Farm::find(4)
        ->get();

        $house1= House::where('farm_id',1)
        ->get();

        $flock = Flock::where('status',1)
        ->first();

        $docList = Chicken::where('farm_id',1)
        ->get();

        return view('admin/doc/allDoc')->with('docList', $docList)->with('farm1',$farm1)->with('house1', $house1)->with('flock', $flock);
    }

    function addDoc(Request $req){
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

    function getChicken(){
        return view('admin/chicken/allChicken');
    }

    function getHouseChicken(){
        return view('admin/chicken/dailyChicken');
    }

    // function addEmployee(Request $req){

    //     $data = new Employee;
    //     $data->name = $req->input('name');
    //     $data->address=$req->input('address');
    //     $data->phone=$req->input('phone');
    //     $data->designation_id=$req->input('designation_id');
    //     $data->salary=$req->input('salary');
    //     $data->nid=$req->input('nid');
    //     $data->status=1;
    //     $data->save();

    //     if($req->file('image')){
    //         $user_slug = $data->id;
    //         $fileInfo = $req->file('image');

    //         $name = $req->file('image')->getClientOriginalName();
    //         $rawfile = $user_slug.$name;
    //         $finalfile=str_replace([':', '\\', '/', '*', '#',' ','-'], '', $rawfile);
    //         $folder = "images/employees";
    //         $fileInfo->move($folder, $finalfile);
    //         // $fileUrl = $folder .'/'. $finalfile;

    //         $userImage = Employee::find($user_slug);
    //         $userImage->image = $finalfile;
    //         $userImage->save();
    //     }

    //     $req->session()->flash('status','New employee added successfully');
    //     return redirect()->back();
    // }
}