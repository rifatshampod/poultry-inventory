<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Designation;

class hrController extends Controller
{
    function getEmployee(){

        $designationList = Designation::all();
        $employeeList = Employee::all();

        return view('admin/hr/employee')->with('employeeList', $employeeList)->with('designationList',$designationList);
    }

    function addEmployee(Request $req){

        $data = new Employee;
        $data->name = $req->input('name');
        $data->address=$req->input('address');
        $data->phone=$req->input('phone');
        $data->designation_id=$req->input('designation_id');
        $data->salary=$req->input('salary');
        $data->nid=$req->input('nid');
        $data->status=1;
        $data->save();

        $req->session()->flash('status','New employee added successfully');
        return redirect()->back();
    }
}