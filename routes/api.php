<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::middleware('guestSanctum')->post('/register', [AuthController::class, 'register'])->name('register');
Route::middleware('guestSanctum')->post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('authSanctum')->get('/user', [AuthController::class, 'user']);
Route::middleware('authSanctum')->delete('/logout', [AuthController::class, 'logout']);
Route::middleware('authSanctum')->delete('/user', [AuthController::class, 'deleteUser']);
