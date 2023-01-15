<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;

class ReportController extends Controller
{
    
    function getMortality(){

        $flock = Flock::all();
        $farm = Farm::all();

        return view ('admin/report/introMortality')->with('flockList', $flock)->with('farmList', $farm);
    }
}