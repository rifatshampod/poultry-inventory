<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Designation;
use App\Models\Leave;
use App\Models\Farm;

class hrController extends Controller
{
    function getEmployee(){

        $designationList = Designation::all();
        
        if(auth()->user()->role ==1){
        $farmList = Farm::all();
        $employeeList = Employee::all();
        }
        else{
            $loggedFarm = auth()->user()->farm_id ; 
            $farmList = Farm::where('id', $loggedFarm)
            ->get();

            $employeeList = Employee::where('farm_id', $loggedFarm)
            ->get();
        }

        return view('admin/hr/employee')->with('employeeList', $employeeList)->with('designationList',$designationList)->with('farmList', $farmList);
    }

    function addEmployee(Request $req){

        $data = new Employee;
        $data->name = $req->input('name');
        $data->farm_id = $req->input('farm_id');
        $data->address=$req->input('address');
        $data->phone=$req->input('phone');
        $data->designation_id=$req->input('designation_id');
        $data->salary=$req->input('salary');
        $data->nid=$req->input('nid');
        $data->status=1;
        $data->save();

        if($req->file('image')){
            $user_slug = $data->id;
            $fileInfo = $req->file('image');

            $name = $req->file('image')->getClientOriginalName();
            $rawfile = $user_slug.$name;
            $finalfile=str_replace([':', '\\', '/', '*', '#',' ','-'], '', $rawfile);
            $folder = "images/employees";
            $fileInfo->move($folder, $finalfile);
            // $fileUrl = $folder .'/'. $finalfile;

            $userImage = Employee::find($user_slug);
            $userImage->image = $finalfile;
            $userImage->save();
        }

        $req->session()->flash('status','New employee added successfully');
        return redirect()->back();
    }

    //leave requests

    function getLeaveRequests(){
        
        if(auth()->user()->role ==1){
            $employeeList = Employee::all();
            $leaveList = Leave::all();
        }
        else{
            $loggedFarm = auth()->user()->farm_id ; 
            $employeeList = Employee::where('farm_id', $loggedFarm)
            ->get();

            $leaveList = Leave::join('employees','employees.id','=','leaves.employee_id')
            ->where('employees.farm_id','=',$loggedFarm)
            ->get();
        }
        
        
        return view('admin/hr/allLeave')->with('employeeList', $employeeList)->with('leaveList', $leaveList);
        //return view('admin/hr/allLeave');
    }

    function addLeaveRequests(Request $req){
        
        $data = new Leave;
        $data->employee_id = $req->input('employee_id');
        $data->from=$req->input('from');
        $data->to=$req->input('to');
        $data->duration=$req->input('duration');
        $data->reason=$req->input('reason');
        $data->save();
        
         $req->session()->flash('status','New leave added successfully');
        return redirect()->back();
    }
}