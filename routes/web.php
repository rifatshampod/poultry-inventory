<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\settingsController;

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
    return view('welcome');
});

Route::view('dashboard',"admin/dashboard");

//settings
Route::get('users',[settingsController::class,'getUser']);
Route::get('flock',[settingsController::class,'getFlock']);
Route::get('farm',[settingsController::class,'getFarm']);
Route::post('add-farm', [settingsController::class,'addFarm']);

Route::get('house',[settingsController::class,'getHouse']);
Route::post('add-house', [settingsController::class,'addHouse']);

Route::get('expense-type',[settingsController::class,'getExpenseType']);
Route::get('expense-sector',[settingsController::class,'getExpenseSector']);
Route::get('bonus-type',[settingsController::class,'getBonusType']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');