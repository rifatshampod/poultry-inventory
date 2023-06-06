<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daily_chicken;
use App\Models\Flock;
use App\Models\Chicken;
use App\Models\Total_cash;
use App\Models\Total_feed;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

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
        return redirect('dashboard');
    }

    public function adminDashboard()
    {
        $userRole = auth()->user()->role;
        $userFarm = auth()->user()->farm_id;

        if($userRole ==1){

            $flockList = Flock::where('status', 1)
            ->get();

            $chickenList = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
            ->select('chickens.*',
            DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
            DB::raw('MAX(daily_chickens.weight_avg) AS avg_weight'), 
            DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
            DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection'),
            DB::raw('SUM(chickens.sum_of_doc) AS sum_of_chicken')
            )
            ->groupBy('chickens.farm_id')
            ->where('chickens.status', 1)
            ->get();

            $total = DB::table('chickens')
                ->where('status', 1)
                ->sum('sum_of_doc');

            $dead = DB::table('daily_chickens')
                ->join('chickens','chickens.id','daily_chickens.chicken_id')
                ->where('chickens.status',1)
                ->sum('mortality');

            $rejected = DB::table('daily_chickens')
                ->join('chickens','chickens.id','daily_chickens.chicken_id')
                ->where('chickens.status',1)
                ->sum('rejection');

            $expense = DB::table('expenses')
                ->select(DB::raw('SUM(amount) as total, MIN(created_at) as first, MAX(created_at) as last'))
                ->first();
            
            
            $feed = DB::table('total_feeds')
                ->sum('amount');
            $farmFeed = Total_feed::get();
            
            $cash = DB::table('total_cashes')
                ->sum('amount');
            $farmCash = Total_cash::get();
            
            $feedRestock = DB::table('feeds')
                ->sum('amount');
            $consumption = DB::table('daily_chickens')
                ->sum('feed_consumption');

        }
        else{
            $flockList = Flock::where('status', 1)
                        ->where('farm_id', $userFarm)
                        ->get();

            $chickenList = chicken::leftJoin('daily_chickens','daily_chickens.chicken_id','=','chickens.id')
            ->select('chickens.*',
            DB::raw('SUM(daily_chickens.mortality) AS sum_of_mortality'),
            DB::raw('MAX(daily_chickens.weight_avg) AS avg_weight'), 
            DB::raw('AVG(daily_chickens.fcr) AS avg_fcr'),
            DB::raw('SUM(daily_chickens.rejection) AS sum_of_rejection'),
            DB::raw('SUM(chickens.sum_of_doc) AS sum_of_chicken')
            )
            ->groupBy('chickens.farm_id')
            ->where('chickens.status', 1)
            ->where('chickens.farm_id', $userFarm)
            ->get();

            $total = DB::table('chickens')
                ->where('status', 1)
                ->where('farm_id', $userFarm)
                ->sum('sum_of_doc');

            $dead = DB::table('daily_chickens')
                ->join('chickens','chickens.id','daily_chickens.chicken_id')
                ->where('chickens.status',1)
                ->where('chickens.farm_id', $userFarm)
                ->sum('mortality');

            $rejected = DB::table('daily_chickens')
                ->join('chickens','chickens.id','daily_chickens.chicken_id')
                ->where('chickens.status',1)
                ->where('chickens.farm_id', $userFarm)
                ->sum('rejection');

            $expense = DB::table('expenses')
                ->select(DB::raw('SUM(amount) as total, MIN(created_at) as first, MAX(created_at) as last'))
                ->where('farm_id', $userFarm)
                ->first();
            
            
            $feed = DB::table('total_feeds')
                ->where('farm_id', $userFarm)
                ->sum('amount');
            $farmFeed = Total_feed::where('farm_id', $userFarm)
            ->get();

            $cash = DB::table('total_cashes')
                ->where('farm_id', $userFarm)
                ->sum('amount');
            $farmCash = Total_cash::where('farm_id', $userFarm)
            ->get();

            $feedRestock = DB::table('feeds')
                ->where('farm_id', $userFarm)
                ->sum('amount');
            $consumption = DB::table('daily_chickens')
                ->join('chickens','chickens.id','daily_chickens.chicken_id')
                ->where('chickens.farm_id', $userFarm)
                ->sum('feed_consumption');
        }

    
        return view ('admin/dashboard')->with('flockList', $flockList)->with('chicken',$total)
        ->with('dead',$dead)->with('rejected',$rejected)->with('expense', $expense)
        ->with('feed', $feed)->with('farmFeed', $farmFeed)->with('feedRestock', $feedRestock)->with('consumption', $consumption)
        ->with('cash', $cash)->with('farmCash', $farmCash)->with('chickenList', $chickenList);

        
    }

    public function profile(){

        return view('profile');
    }

    public function profileUpdate(Request $req){
        $profile_id = $req->user()->id;
        $profile = User::find($profile_id);
        $profile->name = $req->input('name');
        $profile->phone=$req->input('phone');
        $profile->update();

         $req->session()->flash('status','Information updated successfully');
        return redirect()->back();
    }

    public function passwordUpdate(Request $req){

        $validated = $req->validate([
        'oldPassword' => 'required',
        ]);
        
        $user = auth()->user();

        if (!Hash::check($req->input('oldPassword'), $user->password)) {
            return redirect()->back()->with('error', 'The old password is incorrect.');
        }

        $profile_id = $req->user()->id;
        $profile = User::find($profile_id);
        $profile->password=Hash::make($req->input('newPassword'));
        $profile->update();

        return redirect()->back()->with('status', 'Password updated successfully!');
        
        
    }
}