<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chicken;
use App\Models\Daily_chicken;
use App\Models\Expense;
use App\Models\Expense_sector;
use App\Models\Expense_type;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;
use App\Models\Feed;
use Illuminate\Support\Facades\DB;

class accountController extends Controller
{
    //
    function getAddExpense(){

       $farmList = Farm::all();
       $houseList = House::all();
       $sectorList = Expense_sector::all();
       $typeList = Expense_type::all();
        $flockList = Flock::where('status',1)
        ->first();
       
        return view('admin/account/addExpense')->with('farmList', $farmList)->with('houseList', $houseList)
        ->with('sectorList', $sectorList)->with('typeList', $typeList)->with('flockList', $flockList);
    }

    function getExpense(){

       $feedList = Feed::all();
       
        return view('admin/Feed/feedRestock')->with('feedList', $feedList);
    }

    function addExpense(Request $req){
        $data = new Expense;
        $data->date = $req->input('date');
        $data->farm_id=$req->input('farm_id');
        $data->house_id=$req->input('house_id');
        $data->flock_id=$req->input('flock_id');
        $data->expense_sector_id=$req->input('expense_sector_id');
        $data->expense_type_id=$req->input('expense_type_id');
        $data->amount=$req->input('amount');
        $data->paid_from=$req->input('paid_from');
        $data->approver=$req->input('approver');
        $data->reference=$req->input('reference');
        $data->save();

        $req->session()->flash('status','New Expense added successfully');
        return redirect()->back();
    }
}