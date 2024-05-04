<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FutsalDetailsController;
use App\Http\Controllers\FutsalTimeSlotsController;
use App\Http\Controllers\AdminUserController;
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
    return view('frontend.homepage');
});

Route::get('/aboutus', function () {
    return view('frontend.aboutus');
});


Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/adminlogin', function () {return view('admin.login');});
Route::get('/adminlogout', [AdminUserController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/adminregister', function () {return view('admin.register');});
Route::post('/addUserData', [AdminUserController::class, 'userregister']);
Route::post('/userLogin', [AdminUserController::class, 'userlogin']);


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminUserController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('futsaldetails', [FutsalDetailsController::class, 'index'])->name('getfutsaldetails');
    Route::get('addfutsaldetails', [FutsalDetailsController::class, 'addfutsaldetails']);
    Route::post('storefutsaldetails', [FutsalDetailsController::class, 'store'])->name('storefutsaldetails');

    Route::get('futsaltimeslots', [FutsalTimeSlotsController::class, 'addfutsaltimeslots'])->name('getfutsaltimeslots');
    Route::post('storefutsaltimeslots', [FutsalTimeSlotsController::class, 'store'])->name('storefutsaltimeslots');


});