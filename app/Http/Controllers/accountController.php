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
use App\Models\Pettycash;
use App\Models\Total_cash;
use Illuminate\Support\Facades\DB;

class accountController extends Controller
{
    //
    function getAddExpense(){

        $loggedFarm = auth()->user()->farm_id ; 

        if(auth()->user()->role ==1){
            $farmList = Farm::all();
            $houseList = House::all();
            $flockList = Flock::where('status',1)
            ->get();
        }
        else{
            $farmList = Farm::where('id', $loggedFarm)
            ->get();
            $houseList = House::where('farm_id', $loggedFarm)
            ->get();
            $flockList = Flock::where('status',1)
            ->where('farm_id', $loggedFarm)
            ->get();
        }

        
        $sectorList = Expense_sector::all();
        $typeList = Expense_type::all();
        
       
        return view('admin/account/addExpense')->with('farmList', $farmList)->with('houseList', $houseList)
        ->with('sectorList', $sectorList)->with('typeList', $typeList)->with('flockList', $flockList);
    }

    public function getHouses(Request $request, $id) {
    if ($request->ajax()) {
        return response()->json([
            'houses' => House::where('farm_id', $id)->get()
        ]);
    }
}

    function getExpense(){

        $loggedFarm = auth()->user()->farm_id ; 

        $flock = Flock::where('status',1)
        ->first();

        $currentFlock = $flock['id'];

        if(auth()->user()->role ==1){
            $expenseList = Expense::where('flock_id',$currentFlock)
            ->get();
        }
        else{
           $expenseList = Expense::where('flock_id',$currentFlock)
           ->where('farm_id', $loggedFarm)
            ->get();
        }

       
        return view('admin/account/allExpense')->with('expenseList', $expenseList)->with('flock',$flock);
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

        if($req->input('paid_from')==1){
            $total = Total_cash::where('farm_id', $req->input('farm_id'))->first();
            $total->amount -= $req->input('amount');
            $total->save();
        }

        $req->session()->flash('status','New Expense added successfully');
        return redirect('all-expense');
    }

    function getPettyCash(){
        
        $farmList = Farm::all();

        $pettyCash = Total_cash::all();

        $singleCash = Pettycash::orderBy('id','desc')
        ->get();
        // $pettyCash = Pettycash::select('pettycashes.*',
        // DB::raw('SUM(pettycashes.amount) AS sum_of_amount')
        // )
        // ->groupBy('pettycashes.farm_id')
        // ->get();

        return view('admin/account/pettyCash')->with('farmList', $farmList)->with('pettyCash',$pettyCash)->with('singleCash',$singleCash);
    }

    function addPettyCash(Request $req){
        $data = new Pettycash;
        $data->date = $req->input('date');
        $data->farm_id=$req->input('farm_id');
        $data->amount=$req->input('amount');
        $data->save();

        $total = Total_cash::where('farm_id', $req->input('farm_id'))->first();
        $total->amount += $req->input('amount');
        $total->save();

        $req->session()->flash('status','New Petty Cash added successfully');
        return redirect()->back();
    }
}