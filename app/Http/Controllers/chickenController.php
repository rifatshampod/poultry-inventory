<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chickenController extends Controller
{
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