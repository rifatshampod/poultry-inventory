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
          
        // $flock = Flock::where('status',1)
        // ->first();

        //$currentFlock = $flock['id'];

        $sectorList = Expense_sector::all();
        $typeList = Expense_type::all();

        if(auth()->user()->role ==1){
            $expenseList = Expense::orderBy('id', 'desc')
            ->get();
            $farmList = Farm::all();
            $houseList = House::all();
            $flockList = Flock::where('status',1)
            ->get();
        }
        else{
           $expenseList = Expense::where('farm_id', $loggedFarm)
            ->get();
              $farmList = Farm::where('id', $loggedFarm)
            ->get();
            $houseList = House::where('farm_id', $loggedFarm)
            ->get();
            $flockList = Flock::where('status',1)
            ->where('farm_id', $loggedFarm)
            ->get();
        }
        
        return view('admin/account/allExpense')->with('expenseList', $expenseList)
        ->with('farmList', $farmList)->with('houseList', $houseList)
        ->with('flockList', $flockList) ->with('sectorList', $sectorList)
        ->with('typeList', $typeList);
    }

    function addExpense(Request $req){
        

        if($req->input('paid_from')==1){
            $total = Total_cash::where('farm_id', $req->input('farm_id'))->first();
            if($total){
                $pettyStock = $total['amount']-$req->input('amount');
                if($pettyStock<=0){
                    $req->session()->flash('error','Petty cash stock is lowar than expense amount. Please add Petty cash first.');
                }
                else{
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

                    $total->amount -= $req->input('amount');
                    $total->save();

                    $req->session()->flash('status','New Expense added successfully');
                }
                
            }
            else{
                $req->session()->flash('error','No Petty cash available for this farm. Please add Petty cash first.');
            }
            
        }
        else{
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
        }

        
        return redirect('all-expense');
    }

    //edit Expense
    function getEditExpense($id){
        $data=Expense::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data,
        ]);
    }

    function updateExpense(Request $req){

       
        $expense = $req->input('expense_id');
        

        //Retrieve previous data

        $data = Expense::find($expense);
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
        $data->update();

        //Change total

        $difference = $req->input('amount')-$req->input('previous_amount');
        $farm = $req->input('farm_id');

        $total = Total_cash::where('farm_id', $farm)->first();
        $total->amount -= $difference;
        $total->save();

        $req->session()->flash('status', 'Expense data updated successfully.');
        return redirect()->back();
    }

    function getPettyCash(){
        
        $farmList = Farm::all();

        $pettyCash = Total_cash::all();

        $singleCash = Pettycash::orderBy('id','desc')
        ->get();

        return view('admin/account/pettyCash')->with('farmList', $farmList)->with('pettyCash',$pettyCash)->with('singleCash',$singleCash);
    }

    function addPettyCash(Request $req){
        $data = new Pettycash;
        $data->date = $req->input('date');
        $data->farm_id=$req->input('farm_id');
        $data->amount=$req->input('amount');
        $data->save();

        $total = Total_cash::where('farm_id', $req->input('farm_id'))->first();
        if($total){
            $total->amount += $req->input('amount');
            $total->save();
        }
        else{
            $feedTotal = new Total_cash;
            $feedTotal->farm_id = $req->input('farm_id');
            $feedTotal->amount = $req->input('amount');
            $feedTotal->save();
        }

        $req->session()->flash('status','New Petty Cash added successfully');
        return redirect()->back();
    }

    //edit petty cash
    //edit Expense
    function getEditPettyCash($id){
        $data=Pettycash::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data,
        ]);
    }

    function updatePettyCash(Request $req){

       
        $pettyCash = $req->input('pettycash_id');
        
        //Retrieve previous data

        $data = Pettycash::find($pettyCash);
        $data->date = $req->input('date');
        $data->farm_id=$req->input('farm_id');
        $data->amount=$req->input('amount');
        $data->update();

        //Change total

        $difference = $req->input('amount')-$req->input('previous_amount');
        $farm = $req->input('farm_id');

        $total = Total_cash::where('farm_id', $farm)->first();
        $total->amount += $difference;
        $total->save();

        $req->session()->flash('status', 'Petty Cash data updated successfully.');
        return redirect()->back();
    }
}