<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



//Route::get('/user-deatils', [AuthController::class, 'getUserDetails']);


Route::post('/auth', [AuthController::class, 'api_login']);

Route::get('/dtl', [AuthController::class, 'api_admin_dtl'])->middleware(['auth:admin-api','scopes:admin']);
