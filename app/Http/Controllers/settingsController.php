<?php

namespace App\Http\Controllers;

use App\Models\Bonus_type;
use App\Models\Expense_sector;
use App\Models\Expense_type;
use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\House;
use App\Models\Designation;
use App\Models\Flock;
use App\Models\User;
use App\Models\Standard;
use Illuminate\Support\Facades\Hash;

class settingsController extends Controller
{
    function getFlock(){
        $flockList = Flock::orderBy('id','desc')
        ->get();
        $farmList = Farm::get();

        return view('admin/settings/flock')->with('flockList', $flockList)->with('farmList', $farmList);
    }
    function addFlock(Request $req){

        //Flock::query()->update(['status' => 0]);

        $data = new Flock;
        $data->name = $req->input('name');
        $data->farm_id = $req->input('farm_id');
        $data->start_date=$req->input('start_date');
        $data->end_date=$req->input('end_date');
        $data->status = 1;
        $data->save();

        $req->session()->flash('status','New flock added successfully');
        return redirect()->back();
    }
    function editFlockData($id){
        $data=Flock::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$data,
        ]);
    }

    function updateFlockData(Request $req){
        $flock_id = $req->input('flock_id');
        $flock = Flock::find($flock_id);
        $flock->name = $req->input('name');
        $flock->start_date=$req->input('start_date');
        $flock->end_date=$req->input('end_date');
        $flock->status=$req->input('status');
        $flock->update();

        return redirect()->back();
    }

    //Farm --------------------------------------------------------------
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
    function editFarmData($id){
        $farm=Farm::find($id);
        return response()->json([
            'status'=>200,
            'farm'=>$farm,
        ]);
    }

    function updateFarmData(Request $req){
        $farm_id = $req->input('farm_id');
        $farm = Farm::find($farm_id);
        $farm->name = $req->input('farm_name');
        $farm->address=$req->input('address');
        $farm->phone=$req->input('phone');
        $farm->update();

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

    //designation
    function getDesignation(){
        
        $getList = Designation::all();

        return view('admin/settings/designation')->with('getList', $getList);
    }
    function addDesignation(Request $req){

        $data = new Designation();
        $data->name = $req->input('name');
        $data->responsibility = $req->input('responsibility');
        $data->save();

        $req->session()->flash('status','New Designation added successfully');
        return redirect()->back();
    }

    //users

    function getUser(){

        $userList = User::get();
        $farmList = Farm::all();

        return view('admin/settings/user')->with('userList', $userList)->with('farmList', $farmList);
    }
    
    function addUser(Request $req){

        $farm = 0;
        if($req->input('role')==2){
            $farm = $req->input('farm_id');
        }

        $data = new User();
        $data->name = $req->input('name');
        $data->email = $req->input('email');
        $data->phone = $req->input('phone');
        $data->role = $req->input('role');
        $data->farm_id = $farm;
        $data->password = Hash::make($req->input('password'));
        $data->save();

        $req->session()->flash('status','New user added successfully');
        return redirect()->back();
    }

    function editUserData($id){
        $user=User::find($id);
        return response()->json([
            'status'=>200,
            'user'=>$user,
        ]);
    }

    function updateUserData(Request $req){
        $user_id = $req->input('user_id');
        $user = User::find($user_id);
        $user->name = $req->input('name');
        $user->email=$req->input('email');
        $user->phone=$req->input('phone');
        $user->role=$req->input('role');
        $user->farm_id=$req->input('farm_id');
        $user->update();

        return redirect()->back();
    }

    function editUserPasswordData($id){

        $userData = User::where('id', $id)
                    ->get()->first();

        return view('admin/settings/changePassword')->with('userData', $userData);
    }

    function updateUserPassword(Request $req){

        $this->validate($req, [
        'password' => 'confirmed|min:6',
        ]);
        
        $user_id = $req->input('user_id');
        $user = User::find($user_id);
        $user->password=Hash::make($req->input('password'));
        $user->update();

        if($user){
             $req->session()->flash('status','User password changed successfully');
             return redirect('users');
        }
        else{
            $req->session()->flash('error','Password Change unsuccessfull');
            return redirect()->back();
        }
    
    }

    function deleteUserData($id){

        $userData = User::where('id', $id)
                    ->get()->first();

        return view('admin/settings/deleteUser')->with('userData', $userData);
    }

    function deleteUser(Request $req){

        $user_id = $req->input('user_id');

        $user = User::find($user_id);
        $user->delete();

        $req->session()->flash('status','User deleted successfully');
             return redirect('users');

    }

    //Standards
    function getStandard(){

        $standardList = Standard::get();

        return view('admin/settings/standard')->with('standardList', $standardList);
    }
    
    function addStandard(Request $req){
        $standard = new Standard();
        $standard->weight = $req->input('weight');
        $standard->daily_gain=$req->input('daily_gain');
        $standard->fcr=$req->input('fcr');
        $standard->dfc=$req->input('dfc');
        $standard->cfc=$req->input('cfc');
        $standard->save();


        $req->session()->flash('status','New standard added successfully');
        return redirect()->back();
    }

    function editStandardData($id){
        $standard=Standard::find($id);
        return response()->json([
            'status'=>200,
            'standard'=>$standard,
        ]);
    }

    function updateStandardData(Request $req){
        $standard_id = $req->input('id');
        $standard = Standard::find($standard_id);
        $standard->weight = $req->input('weight');
        $standard->daily_gain=$req->input('daily_gain');
        $standard->fcr=$req->input('fcr');
        $standard->dfc=$req->input('dfc');
        $standard->cfc=$req->input('cfc');
        $standard->update();

        return redirect()->back();
    }

    
}