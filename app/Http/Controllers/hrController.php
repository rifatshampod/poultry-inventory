<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hrController extends Controller
{
    function getEmployee(){
        return view('admin/hr/employee');
    }
}