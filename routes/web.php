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
    return view('auth.login');
});
  
    Route::controller(LoginRegisterController::class)->group(function() {
        // Route::get('/register', 'register')->name('register');
        // Route::post('/store', 'store')->name('store');
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::get('/personnel/login', [PersonnelsController::class, 'personnelLogin'])->name('personnel.login');

    Route::post('/personnel/login_authenticate', [PersonnelsController::class, 'personnelauthenticate'])->name('personnel.authenticate');
    Route::get('/admin/dashboard', [PersonnelsController::class, 'adminDashboard'])->name('personnel.admin.dashboard');
    
    Route::get('/facilitator/dashboard', [PersonnelsController::class, 'facilitatorDashboard'])->name('personnel.faci.dashboard');
    Route::get('/facilitator/candidates', [PersonnelsController::class, 'faciCandidates'])->name('personnel.faci.candidates');
    Route::get('/facilitator/voters', [PersonnelsController::class, 'faciVoters'])->name('personnel.faci.voters');
    Route::get('/facilitator/about', [PersonnelsController::class, 'faciAbout'])->name('personnel.faci.about');

    Route::get('/admin/votes', [PersonnelsController::class, 'votesIndex'])->name('personnels.votes');
    Route::get('/admin/personnels', 'App\Http\Controllers\PersonnelsController@index')->name('personnels.index');
    Route::get('/admin/election', [PersonnelsController::class, 'electionIndex'])->name('personnels.election');
    Route::get('/admin/voters', [PersonnelsController::class, 'votersIndex'])->name('personnels.voters');
    Route::get('/admin/candidates', [PersonnelsController::class, 'candidatesIndex'])->name('personnels.candidates');
    Route::get('/admin/reports', [PersonnelsController::class, 'reportsIndex'])->name('personnels.reports');
    Route::get('/admin/about', [PersonnelsController::class, 'aboutIndex'])->name('personnels.about');
    
    
// Route::post('/personnel/logout', [PersonnelsController::class, 'logout'])->name('personnel.logout');
Route::match(['get', 'post'], '/personnel/logout', [PersonnelsController::class, 'logout'])->name('personnel.logout');
