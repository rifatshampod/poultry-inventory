<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\hrController;
use App\Http\Controllers\chickenController;

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


//core HR
Route::get('active-employee',[hrController::class,'getEmployee']);
Route::post('add-employee',[hrController::class,'addEmployee']);
//leave
Route::get('all-leave',[hrController::class,'getLeaveRequests']);
Route::post('add-leave',[hrController::class,'addLeaveRequests']);

//settings         ---------------------------------------------------
Route::get('users',[settingsController::class,'getUser']);
Route::get('flock',[settingsController::class,'getFlock']);
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