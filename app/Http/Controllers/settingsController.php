<?php

namespace App\Http\Controllers;

use App\Models\Bonus_type;
use App\Models\Expense_sector;
use App\Models\Expense_type;
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

        $getList = Expense_type::all();

        return view('admin/settings/expenseType')->with('getList', $getList);
    }
    function addExpenseType(Request $req){

        $data = new Expense_type();
        $data->name = $req->input('name');
        $data->save();

        $req->session()->flash('status','New expense type added successfully');
        return redirect()->back();
    }

    //expense sector
    function getExpenseSector(){
        
        $getList = Expense_sector::all();
        
        return view('admin/settings/expenseSector')->with('getList', $getList);
    }
    function addExpenseSector(Request $req){

        $data = new Expense_sector();
        $data->name = $req->input('name');
        $data->save();

        $req->session()->flash('status','New expense sector added successfully');
        return redirect()->back();
    }

    //bonus type
    function getBonusType(){
        
        $getList = Bonus_type::all();

        return view('admin/settings/bonusType')->with('getList', $getList);
    }
    function addBonusType(Request $req){

        $data = new Bonus_type();
        $data->name = $req->input('name');
        $data->description = $req->input('description');
        $data->save();

        $req->session()->flash('status','New bonus type added successfully');
        return redirect()->back();
    }

    function getUser(){
        return view('admin/settings/user');
    }
}