<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daily_chicken;
use App\Models\Flock;
use App\Models\Chicken;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminDashboard()
    {
        $flock = Flock::where('status', 1)
        ->get()->first();


        $chickenList = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
        ->select('chickens.*',
        DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
        DB::raw('MAX(daily_chickens.weight_avg) AS avg_weight'), 
        DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
        DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection'),
        DB::raw('SUM(chickens.sum_of_doc) AS sum_of_chicken')
        )
        ->groupBy('chickens.farm_id')
        ->get();

        $total = DB::table('chickens')
            ->sum('sum_of_doc');

        $dead = DB::table('daily_chickens')
            ->sum('mortality');

        $rejected = DB::table('daily_chickens')
            ->sum('rejection');

        $expense = DB::table('expenses')
            ->select(DB::raw('SUM(amount) as total, MIN(created_at) as first, MAX(created_at) as last'))
            ->first();
        
        $feed = DB::table('total_feeds')
            ->sum('amount');
        $feedRestock = DB::table('feeds')
            ->sum('amount');
        $consumption = DB::table('daily_chickens')
            ->sum('feed_consumption');

        return view ('admin/dashboard')->with('flock', $flock)->with('chicken',$total)
        ->with('dead',$dead)->with('rejected',$rejected)->with('expense', $expense)
        ->with('feed', $feed)->with('feedRestock', $feedRestock)->with('consumption', $consumption)
        ->with('chickenList', $chickenList);

        
    }
}