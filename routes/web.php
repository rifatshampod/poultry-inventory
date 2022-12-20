<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\hrController;
use App\Http\Controllers\chickenController;
use App\Http\Controllers\feedController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\medicineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin/dashboard');
});

Route::view('dashboard',"admin/dashboard");

//Chicken
Route::get('all-chicken', [chickenController::class,'getChicken']);
Route::get('add-chicken', [chickenController::class,'getAddChicken']);
Route::get('daily-chicken', [chickenController::class,'getHouseChicken']);
Route::post('add-daily-data', [chickenController::class,'addDailyChicken']);
Route::get('getdata-add-chicken{slug}', [chickenController::class,'getAddChickenData']);

//DOC
Route::get('all-doc', [chickenController::class,'getDoc']);
Route::post('add-doc', [chickenController::class,'addDoc']);

//Feed
Route::get('all-feed', [feedController::class,'getFeed']);
Route::post('add-feed', [feedController::class,'addFeed']);
Route::get('feed-restock', [feedController::class,'getRestockFeed']);

//Medicine
Route::get('all-medicine', [medicineController::class,'getMedicine']);
Route::post('add-medicine', [medicineController::class,'addMedicine']);
Route::get('all-house-medicine', [medicineController::class,'getHouseMedicine']);
Route::get('distribute-medicine', [medicineController::class,'getDistribution']);

//Account
Route::get('add-expense', [accountController::class,'getAddExpense']);
Route::get('all-expense', [accountController::class,'getExpense']);
Route::post('add-expense-data', [accountController::class,'addExpense']);
Route::get('petty-cash', [accountController::class,'getPettyCash']);
Route::post('add-petty-cash', [accountController::class,'addPettyCash']);


//core HR
Route::get('active-employee',[hrController::class,'getEmployee']);
Route::post('add-employee',[hrController::class,'addEmployee']);
//leave
Route::get('all-leave',[hrController::class,'getLeaveRequests']);
Route::post('add-leave',[hrController::class,'addLeaveRequests']);

//settings         ---------------------------------------------------
Route::get('users',[settingsController::class,'getUser']);

Route::get('flock',[settingsController::class,'getFlock']);
Route::post('add-flock', [settingsController::class,'addFlock']);

Route::get('farm',[settingsController::class,'getFarm']);
Route::post('add-farm', [settingsController::class,'addFarm']);

Route::get('house',[settingsController::class,'getHouse']);
Route::post('add-house', [settingsController::class,'addHouse']);

Route::get('expense-type',[settingsController::class,'getExpenseType']);
Route::post('add-expense-type',[settingsController::class,'addExpenseType']);

Route::get('expense-sector',[settingsController::class,'getExpenseSector']);
Route::post('add-expense-sector',[settingsController::class,'addExpenseSector']);

Route::get('bonus-type',[settingsController::class,'getBonusType']);
Route::post('add-bonus-type',[settingsController::class,'addBonusType']);

Route::get('designation',[settingsController::class,'getDesignation']);
Route::post('add-designation',[settingsController::class,'addDesignation']);
//Settings ---------------------------------------------------------------------

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');