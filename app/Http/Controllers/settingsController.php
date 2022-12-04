<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\House;

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

        $data = new Farm;
        $data->name = $req->input('name');
        $data->address=$req->input('address');
        $data->phone=$req->input('phone');
        $data->save();

        $req->session()->flash('status','New farm added successfully');
        return redirect()->back();
    }

    //House
    function getHouse(){

        $farmList = Farm::all();
        $houseList = House::all();

        return view('admin/settings/house')->with('farmList', $farmList)->with('houseList', $houseList);
    }
    function addHouse(Request $req){

        $data = new House;
        $data->name = $req->input('name');
        $data->farm_id=$req->input('farm_id');
        $data->save();

        $req->session()->flash('status','New house added successfully');
        return redirect()->back();
    }

    //Expense Type
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