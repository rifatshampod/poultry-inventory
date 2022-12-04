<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;

class settingsController extends Controller
{
    function getFlock(){
        return view('admin/settings/flock');
    }
    //Farm 
    function getFarm(){
        $farmList = Farm::all();

        return view('admin/settings/farm')->with('farmList', $farmList);
    }
    function addFarm(Request $req){

        $farm = new Farm;
        $farm->name = $req->input('name');
        $farm->address=$req->input('address');
        $farm->phone=$req->input('phone');
        $farm->save();

        $req->session()->flash('status','New farm added successfully');
        return redirect()->back();
    }

    //House
    function getHouse(){
        return view('admin/settings/house');
    }
    function getExpenseType(){
        return view('admin/settings/expenseType');
    }
    function getExpenseSector(){
        return view('admin/settings/expenseSector');
    }
    function getBonusType(){
        return view('admin/settings/bonusType');
    }
    function getUser(){
        return view('admin/settings/user');
    }
}