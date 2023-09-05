<?php
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest:admin', 'preventBackHistory'])
    ->name(getenv('ADMIN_BASE_NAME').'.')->group(function(){

    Route::get('/login', function () {
                return view('admin.auth.login');
            });

    Route::post('/login', [AuthController::class, 'login'])->name('login');

});


Route::middleware(['auth:admin', 'preventBackHistory'])
  ->name(getenv('ADMIN_BASE_NAME').'.')->group(function(){
     //dashbord routes
     Route::get('/', [DashboardController::class,'show'])->name('dashboard');

     //logout
     Route::get('/logout', [AuthController::class,'logout'])->name('logout');

     //products routs
     Route::prefix('/products')->name('product.')->controller(ProductController::class)
     ->group(function(){
        Route::get('/', 'show')->name('products');
        Route::get('/create', 'create')->name('create');
     });


     //categories routs
     Route::prefix('/category')->name('category.')->controller(CategoryController::class)
     ->group(function(){
        Route::get('/', 'show')->name('category');
     });


    //brands routs
    Route::prefix('/brand')->name('brand.')->controller(BrandController::class)
    ->group(function(){
    Route::get('/', 'show')->name('brand');
    });


     //users routs
     Route::prefix('/user')->name('user.')->controller(UserController::class)
     ->group(function(){
        Route::get('/', 'show')->name('users');
        Route::get('/create', 'create')->name('create');
     });

    //role routs
    Route::prefix('/role')->name('role.')->controller(RoleController::class)
    ->group(function(){
      Route::get('/', 'show')->name('role');
    });


    //Permissions routs
    Route::prefix('/permission')->name('permission.')->controller(PermissionController::class)
    ->group(function(){
      Route::get('/', 'show')->name('permission');
    });

 });

