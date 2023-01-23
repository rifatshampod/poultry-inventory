<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\hrController;
use App\Http\Controllers\chickenController;
use App\Http\Controllers\feedController;
use App\Http\Controllers\accountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\medicineController;
use App\Http\Controllers\saleController;
use App\Http\Controllers\ReportController;

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

Auth::routes();
Auth::routes(['register' => false]);  //auth routes call


Route::group(['middleware' => ['web', 'auth']], function(){
Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('dashboard',[HomeController::class, 'adminDashboard']);

//Profile
Route::get('profile',[HomeController::class, 'profile']);
Route::post('update-profile',[HomeController::class, 'profileUpdate']);
Route::post('update-profile-password',[HomeController::class, 'passwordUpdate']);

//Chicken
Route::get('all-chicken', [chickenController::class,'getChicken']);
Route::get('add-chicken', [chickenController::class,'getAddChicken']);
Route::get('daily-chicken', [chickenController::class,'getHouseChicken']);
Route::post('add-daily-data', [chickenController::class,'addDailyChicken']);
Route::get('getdata-add-chicken{slug}', [chickenController::class,'getAddChickenData']);
Route::get('edit-dailyChicken{id}', [chickenController::class,'getEditDailyChicken']);
Route::post('edit-daily-info', [chickenController::class,'updateDailyChicken']);

//DOC
Route::get('all-doc', [chickenController::class,'getDoc']);
Route::post('add-doc', [chickenController::class,'addDoc']);
Route::get('edit-doc{id}', [chickenController::class,'getEditDoc']);
Route::post('edit-doc-info', [chickenController::class,'updateDoc']);

//Feed
Route::get('all-feed', [feedController::class,'getFeed']);
Route::post('add-feed', [feedController::class,'addFeed']);
Route::get('feed-restock', [feedController::class,'getRestockFeed']);

//Medicine
Route::get('all-medicine', [medicineController::class,'getMedicine']);
Route::post('add-medicine', [medicineController::class,'addMedicine']);
Route::get('all-house-medicine={slug}', [medicineController::class,'getHouseMedicine']);
Route::post('add-farm-medicine', [medicineController::class,'addFarmMedicine']);
Route::get('distribute-medicine', [medicineController::class,'getDistribution']);

//Account
Route::get('add-expense', [accountController::class,'getAddExpense']);
Route::get('all-expense', [accountController::class,'getExpense']);
Route::post('add-expense-data', [accountController::class,'addExpense']);
Route::get('petty-cash', [accountController::class,'getPettyCash']);
Route::post('add-petty-cash', [accountController::class,'addPettyCash']);

//Sell
Route::get('add-sale', [saleController::class,'getAddSale']);
Route::get('all-sale', [saleController::class,'getSale']);
Route::get('all-daily-sale', [saleController::class,'getDailySale']);
Route::post('add-sale-data', [saleController::class,'addSale']);


//core HR
Route::get('active-employee',[hrController::class,'getEmployee']);
Route::post('add-employee',[hrController::class,'addEmployee']);
//leave
Route::get('all-leave',[hrController::class,'getLeaveRequests']);
Route::post('add-leave',[hrController::class,'addLeaveRequests']);

//settings         ---------------------------------------------------
Route::get('users',[settingsController::class,'getUser']);
Route::post('add-user', [settingsController::class,'addUser']);
Route::get('edit-user{id}', [settingsController::class,'editUserData']);
Route::post('edit-user-info', [settingsController::class,'updateUserData']);

Route::get('flock',[settingsController::class,'getFlock']);
Route::post('add-flock', [settingsController::class,'addFlock']);

Route::get('farm',[settingsController::class,'getFarm']);
Route::post('add-farm', [settingsController::class,'addFarm']);
Route::get('edit-farm{id}', [settingsController::class,'editFarmData']);
Route::post('edit-farm-info', [settingsController::class,'updateFarmData']);

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

Route::get('standards',[settingsController::class,'getStandard']);
Route::post('add-standard',[settingsController::class,'addStandard']);
Route::get('edit-standard{id}', [settingsController::class,'editStandardData']);
Route::post('edit-standard-info', [settingsController::class,'updateStandardData']);


//Settings ---------------------------------------------------------------------

//Report routes ----------------------------------------------------------------
//Mortality reports
Route::get('mortality-report',[ReportController::class,'getMortality']);
Route::post('flock-mortality-report',[ReportController::class,'fetchMortalityByFlock']);
Route::post('farm-mortality-report',[ReportController::class,'fetchMortalityByFarm']);
Route::post('date-mortality-report',[ReportController::class,'fetchMortalityByDate']);
//Rejection reports
Route::get('rejection-report',[ReportController::class,'getRejection']);
Route::post('flock-rejection-report',[ReportController::class,'fetchRejectionByFlock']);
Route::post('farm-rejection-report',[ReportController::class,'fetchRejectionByFarm']);
Route::post('date-rejection-report',[ReportController::class,'fetchRejectionByDate']);
//weight reports 
Route::get('weight-report',[ReportController::class,'getWeight']);
Route::post('flock-weight-report',[ReportController::class,'fetchWeightByFlock']);
Route::post('farm-weight-report',[ReportController::class,'fetchWeightByFarm']);
Route::post('date-weight-report',[ReportController::class,'fetchWeightByDate']);
//Feed reports
Route::get('feed-report',[ReportController::class,'getFeed']);
Route::post('flock-feed-report',[ReportController::class,'fetchFeedByFlock']);
Route::post('farm-feed-report',[ReportController::class,'fetchFeedByFarm']);
Route::post('date-feed-report',[ReportController::class,'fetchFeedByDate']);
//Sales Reports
Route::get('sales-report',[ReportController::class,'getSales']);
Route::post('flock-sales-report',[ReportController::class,'fetchSalesByFlock']);
Route::post('farm-sales-report',[ReportController::class,'fetchSalesByFarm']);
Route::post('date-sales-report',[ReportController::class,'fetchSalesByDate']);
//Expense Reports
Route::get('expense-report',[ReportController::class,'getExpense']);
Route::post('farm-expense-report',[ReportController::class,'fetchExpenseByFarm']);
Route::post('date-expense-report',[ReportController::class,'fetchExpenseByDate']);

//Report routes ends -----------------------------------------------------------



Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin/dashboard'])->name('home');

});