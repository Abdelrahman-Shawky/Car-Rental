<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFilteredSearchController;
use App\Http\Controllers\AdminReportsController;
use App\Http\Controllers\AdminSearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome2');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cars', [ReservationController::class, 'datePicker']);


// Route::get('/cars',[HomeController::class,'show']);

Route::post('/cars/{pickupDate}/{dropoffDate}/{pickupLocation}/{dropoffLocation}/{numOfDays}',[ReservationController::class,'filter']);

Route::post('/reserve/{id}/{pickupDate}/{dropoffDate}/{pickupLocation}/{dropoffLocation}/{numOfDays}',[ReservationController::class,'reserve']);
Route::get('/reservations',[CustomerController::class,'index'])->middleware('auth');
Route::post('/reservations/pay/{res_id}',[CustomerController::class,'pay']);


Route::get('completeProfile',[CustomerController::class,'create'])->middleware('auth');
Route::post('completeProfile',[CustomerController::class,'store'])->middleware('auth');


Route::post('delete/{res_id}',[ReservationController::class,'delete']);



//Admin
// Dashboard
Route::get("dashboard",[AdminController::class,'viewDashboard']);
//Cars
Route::get("/admin/cars",[AdminController::class,'indexCars']);
Route::get("/admin/cars/edit/{plate_id}",[AdminController::class,'editCar']);
Route::post("/admin/cars/edit/{plate_id}",[AdminController::class,'updateCar']);
Route::post("/admin/cars/delete/{plate_id}",[AdminController::class,'deleteCar']);
Route::post("/admin/cars/status/available/{plate_id}",[AdminController::class,'makeAvailable']);
Route::post("/admin/cars/status/unAvailable/{plate_id}",[AdminController::class,'makeUnavailable']);
Route::get("/admin/cars/add",[AdminController::class,'createCar']);
Route::post("/admin/cars/add",[AdminController::class,'storeCar']);
//Reservations
Route::get("/admin/reservations",[AdminController::class,'indexReservations']);
//Search
//By car reservations
Route::get("/admin/search/cars",[AdminSearchController::class,'searchCars']);
Route::get("/admin/search/cars/{plate_id}",[AdminSearchController::class,'showFilteredCar']);
//By Customer reservations
Route::get("/admin/search/customers",[AdminSearchController::class,'searchCustomers']);
Route::get("/admin/search/customers/{plate_id}",[AdminSearchController::class,'showFilteredCustomer']);
//By reservation date
Route::get("/admin/search/reservations",[AdminSearchController::class,'searchReservations']);
Route::get("/admin/search/reservations/pickupDate",[AdminSearchController::class,'showFilteredReservations']);
//Availability
Route::get("/admin/search/availability",[AdminSearchController::class,'searchAvailable']);
Route::get("/admin/search/availability/pickupDate",[AdminSearchController::class,'showFilteredAvailable']);
//Filtered Search
//By Car
Route::get("/admin/filteredSearch/cars",[AdminFilteredSearchController::class,'filterByCar']);
Route::post("/admin/filteredSearch/cars",[AdminFilteredSearchController::class,'filteredByCar']);
Route::get("/admin/filteredSearch/cars/{plate_id}",[AdminFilteredSearchController::class,'customerFilteredByCar']);
//Reservation specific period
Route::get("/admin/reports/periodicReservations",[AdminReportsController::class,'periodicReservations']);
Route::post("/admin/reports/periodicReservations",[AdminReportsController::class,'getPeriodicReservations']);



















// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
