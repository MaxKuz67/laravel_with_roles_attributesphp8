<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RefreshController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Role\IndexController;
use App\Http\Controllers\Role\ShowController;
use App\Http\Controllers\Role\StoreController;
use App\Http\Controllers\Role\UpdateController;
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

Route::middleware("api")->group(function () {

    Route::post("auth/login", LoginController::class);

    Route::middleware(["auth:api"])->group(function () {
        Route::prefix("auth")->group(function () {
            Route::get("user", UserController::class);
            Route::post("logout", LogoutController::class);
            Route::post("refresh", RefreshController::class);
        });


        Route::get("/roles", IndexController::class);
        Route::get("/roles/{role}", ShowController::class);
        Route::post("/roles", StoreController::class);
        Route::put("/roles/{role}", UpdateController::class);
    });


});



