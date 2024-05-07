<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FutsalDetailsController;
use App\Http\Controllers\FutsalTimeSlotsController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NormalUserController;
use App\Http\Controllers\BookFutsalsController;
use App\Http\Controllers\PaymentController;
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

Route::get('/register', function () {
    return view('frontend.register');
});

Route::get('/login', function () {
    return view('frontend.login');
});




Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('futsals', [FrontendController::class, 'futsalpage'])->name('getfutsalpage');
Route::get('futsals/{id}', [FrontendController::class, 'futsaldetailspage'])->name('getfutsaldetailspage');

Route::post('/loginnormaluser', [NormalUserController::class, 'login']);
Route::post('/storenormaluser', [NormalUserController::class, 'store']);
Route::get('futsals', [FrontendController::class, 'futsalpage'])->name('getfutsalpage');

Route::post('/bookfutsals', [BookFutsalsController::class, 'store']);
Route::get('bookfutsalsdetails', [BookFutsalsController::class, 'index'])->name('getbookedfutsaldetails');

Route::get('/adminlogin', function () {return view('admin.login');});
Route::get('/adminlogout', [AdminUserController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/adminregister', function () {return view('admin.register');});
Route::post('/addUserData', [AdminUserController::class, 'userregister']);
Route::post('/userLogin', [AdminUserController::class, 'userlogin']);

Route::post('/khalti/payment/verify',[PaymentController::class,'verifyPayment'])->name('khalti.verifyPayment');

Route::post('/khalti/payment/store',[PaymentController::class,'storePayment'])->name('khalti.storePayment');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminUserController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('futsaldetails', [FutsalDetailsController::class, 'index'])->name('getfutsaldetails');
    Route::get('addfutsaldetails', [FutsalDetailsController::class, 'addfutsaldetails']);
    Route::post('storefutsaldetails', [FutsalDetailsController::class, 'store'])->name('storefutsaldetails');

    Route::get('futsaltimeslots', [FutsalTimeSlotsController::class, 'addfutsaltimeslots'])->name('getfutsaltimeslots');
    Route::post('storefutsaltimeslots', [FutsalTimeSlotsController::class, 'store'])->name('storefutsaltimeslots');
    Route::get('futsaltimeslotdetails', [FutsalTimeSlotsController::class, 'index'])->name('getfutsaltimeslotdetails');

    Route::get('payment', [PaymentController::class, 'index'])->name('getpaymentdetails');
});





