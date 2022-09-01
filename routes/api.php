<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CreationAndEdit\TopicCaE;
use App\Http\Controllers\Api\TopicListController;
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



Route::group(['middleware' => 'throttle:api'], function (){

    Route::middleware('guestSanctum')->post('/register', [AuthController::class, 'register'])->name('register');
    Route::middleware('guestSanctum')->post('/login', [AuthController::class, 'login'])->name('login');
    Route::middleware('authSanctum')->get('/user', [AuthController::class, 'user']);
    Route::middleware('authSanctum')->delete('/logout', [AuthController::class, 'logout']);
    Route::middleware('authSanctum')->delete('/user', [AuthController::class, 'deleteUser']);


    Route::group(['middleware' => ['authSanctum']], function () {
        Route::middleware('throttle:1,2')->post('/topic', [TopicCaE::class, 'createTopic']);
        Route::put('/topic/{code}', [TopicCaE::class, 'updateTopic']);
        Route::delete('/topic/{code}', [TopicCaE::class, 'deleteTopic']);
        Route::get('/topic', [TopicListController::class, 'list']);
        Route::get('/search', [TopicListController::class, 'search']);
    });

});


