<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Middleware\CheckLogoutMiddleware;
use App\Http\Middleware\CheckStaffMiddleware;

Route::group(["middleware" => CheckLogoutMiddleware::class], function () {
    Route::get('/login', [AuthController::class, "login"])->name("login");
    Route::post('/process-login', [AuthController::class, "processLogin"])->name("process-login");
});

Route::group(["middleware" => CheckStaffMiddleware::class], function (){
    Route::get('/', [HomepageController::class, "__invoke"])->name("index");
});
