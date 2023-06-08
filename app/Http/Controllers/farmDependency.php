<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\House;
use App\Models\Flock;

class farmDependency extends Controller
{
    public function fetchHouse(Request $request)
    {
        $data['houses'] = House::where("farm_id", $request->farm_id)
                                ->get(["name", "id"]);
        
        $data['flocks'] = Flock::where("farm_id", $request->farm_id)->where('status', 1)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }

    public function fetchHouseReport(Request $request)
    {
        $data['houses'] = House::where("farm_id", $request->farm_id)
                                ->get(["name", "id"]);
        
        $data['flocks'] = Flock::where("farm_id", $request->farm_id)->where('status', 0)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }
}