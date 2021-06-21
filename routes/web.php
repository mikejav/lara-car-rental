<?php

use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\LoginController;
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
    return view('welcome');
})->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('vehicle', VehicleController::class, ['except' => ['show']]);
    Route::resource('customer', CustomerController::class, ['except' => ['show']]);
    Route::resource('rental', RentalController::class, ['except' => ['show', 'create']]);
    Route::get('rental/create/select-customer', [RentalController::class, 'selectCustomerStep'])->name('rental.create.selectCustomerStep');
    Route::get('rental/create/select-vehicle-segment', [RentalController::class, 'selectVehicleSegmentStep'])->name('rental.create.selectVehicleSegmentStep');
    Route::get('rental/create/select-vehicle', [RentalController::class, 'selectVehicleNarrowedToSegmentStep'])->name('rental.create.selectVehicleNarrowedToSegmentStep');
    Route::get('rental/create/select-date-range', [RentalController::class, 'selectDateRangeStep'])->name('rental.create.selectDateRangeStep');
    Route::get('rental/create/summary', [RentalController::class, 'summaryStep'])->name('rental.create.summary');
});

Route::get('login', [LoginController::class, 'index', 'as' => 'login'])->name('login');
Route::post('login', [LoginController::class, 'attempt'])->name('login.attempt');
Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');
