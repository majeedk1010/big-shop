<?php
use App\Http\Controllers\Seller\AuthController;
use App\Http\Controllers\Seller\DashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest:seller', 'preventBackHistory'])
    ->name(getenv('SELLER_BASE_NAME').'.')->group(function(){

    //Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/login', function () {
                return view('seller.auth.login');
            });
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    // Route::view('/register', 'seller.register')->name('register');
    // Route::post('/register', [AuthController::class, 'store'])->name('reg');
});


Route::middleware(['auth:seller', 'preventBackHistory'])
  ->name(getenv('SELLER_BASE_NAME').'.')->group(function(){

    Route::get('/', [DashboardController::class,'show'])->name('dashboard');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');

 });

