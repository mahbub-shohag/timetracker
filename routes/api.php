<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DailyServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::post('token',[UserController::class,'createToken']);

//Route::get('user-list',[UserController::class,'getUserList']);
Route::post('store-user',[UserController::class,'storeUser']);
Route::apiResource('users',UserController::class);

Route::get('test',function (){
    return response()->json([
        'message' => 'Welcome to Laravel API'
    ]);
});
Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('login',[\App\Http\Controllers\UserController::class,'login']);


Route::middleware('auth:sanctum')->group(function (){
   Route::get('user-list',[UserController::class,'getUserList']);
   Route::get('user', [\App\Http\Controllers\Api\AuthController::class, 'user']);
   Route::post('profile',[\App\Http\Controllers\UserController::class,'profile']);
   Route::delete('logout',[UserController::class,'logout']);
   Route::get('client-list',[ClientController::class,'clientList']);
   Route::get('client-detail',[ClientController::class,'clientDetail']);

   Route::get('employee-list',[UserController::class,'employeeList']);
   Route::post('employee-search-list',[UserController::class,'employeeSearchList']);
   Route::post('add-location',[ClientController::class,'addLocation']);
   Route::get('location-list',[ClientController::class,'locationList']);

   Route::post('clock-in',[DailyServiceController::class,'clockIn']);
   Route::post('history-list',[DailyServiceController::class,'historyList']);
});

