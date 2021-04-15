<?php

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\AdministratorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::post('client', [ClientController::class, 'store']);
    Route::post('pharmacy', [PharmacyController::class, 'store']);
    Route::post('courier', [CourierController::class, 'store']);
    
    Route::resource('users', AdministratorController::class);
    Route::resource('pharmacies', PharmacyController::class); 
    Route::resource('addresses', AddressController::class); 
    // Route::post('create', [UserController::class, 'store']);
    // Route::post('update/{id}', [UserController::class, 'update']);
    // Route::delete('delete/{id}', [UserController::class, 'destroy']);
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

