<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ContinentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
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
});

Route::controller(TripController::class)->group(function (){
    Route::get('/',[TripController::class, 'index'])->name('home');
    Route::get('/show/{id}',[TripController::class, 'show'])->name('show');
    Route::get('/trips/{id}',[TripController::class, 'trips'])->name('trips');
    Route::post('/trips/{id}',[TripController::class, 'trips'])->name('trips');
    Route::get('/edit/{id}', [TripController::class, 'edit'])->name('edit');
    Route::put('edit/{id}', [TripController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [TripController::class, 'destroy'])->name('trips.destroy');
    Route::get('/create',[TripController::class, 'create'])->name('create');
    Route::put('/create',[TripController::class, 'store'])->name('trips.store');
});

Route::controller(CityController::class)->group(function (){
    Route::get('/create_city',[CityController::class, 'create'])->name('create_city');
    Route::get('/edit_city/{id}', [CityController::class, 'edit'])->name('edit_city');
    Route::put('edit_city/{id}', [CityController::class, 'update'])->name('update_city');
    Route::put('/create_city',[CityController::class, 'store'])->name('cities.store');
    Route::delete('destroy_city/{id}', [CityController::class, 'destroy'])->name('cities.destroy');
});

Route::controller(CountryController::class)->group(function (){
    Route::get('/create_country',[CountryController::class, 'create'])->name('create_country');
    Route::get('/edit_country/{id}', [CountryController::class, 'edit'])->name('edit_country');
    Route::put('edit_country/{id}', [CountryController::class, 'update'])->name('update_country');
    Route::put('/create_country',[CountryController::class, 'store'])->name('country.store');
    Route::delete('destroy_country/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');
});

Route::controller(ContinentController::class)->group(function (){
    Route::get('/offer',[ContinentController::class, 'offer'])->name('offer');
    Route::post('/offer',[ContinentController::class, 'offer'])->name('offer');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/register','register')->name('register');
    Route::post('/register_','register_')->name('register_');
});

Route::controller(UserController::class)->group(function(){
    Route::put('/show/{id}/save', [UserController::class, 'save'])->name('save');
    Route::get('/user',[UserController::class, 'account'])->name('account');
    Route::get('/cancel/{id}', [UserController::class, 'cancel'])->name('trips.cancel');
});

