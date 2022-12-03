<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::view('users',"admin/settings/user");
Route::view('flock',"admin/settings/flock");
Route::view('farm',"admin/settings/farm");
Route::view('house',"admin/settings/house");
Route::view('expense-type',"admin/settings/expenseType");
Route::view('expense-sector',"admin/settings/expenseSector");
Route::view('bonus-type',"admin/settings/bonusType");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');