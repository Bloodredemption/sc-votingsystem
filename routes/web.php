<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\PersonnelsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    // Route::get('/admin/login', 'adminLogin')->name('adminLogin');
});

Route::get('/personnel/login', [PersonnelsController::class, 'personnelLogin'])->name('personnel.login');
Route::post('/personnel/login', [PersonnelsController::class, 'personnelauthenticate'])->name('personnel.authenticate');
Route::get('/personnel/admin/dashboard', [PersonnelsController::class, 'adminDashboard'])->name('personnel.admin.dashboard');
Route::get('/personnel/facilitator/dashboard', [PersonnelsController::class, 'facilitatorDashboard'])->name('personnel.facilitator.dashboard');

// Route::post('/personnel/logout', [PersonnelsController::class, 'logout'])->name('personnel.logout');
Route::match(['get', 'post'], '/personnel/logout', [PersonnelsController::class, 'logout'])->name('personnel.logout');

Route::get('/personnel/admin/personnels', 'App\Http\Controllers\PersonnelsController@index')->name('personnels.index');