<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Middleware\CheckLogoutMiddleware;
use App\Http\Middleware\CheckStaffMiddleware;

Route::group(["middleware" => CheckLogoutMiddleware::class], function () {
    Route::get('/login', [AuthController::class, "login"])->name("login");
    Route::post('/process-login', [AuthController::class, "processLogin"])->name("process-login");
});

Route::group(["middleware" => CheckStaffMiddleware::class], function (){
    Route::get('/', [HomepageController::class, "__invoke"])->name("index");

    Route::get('/logout', [AuthController::class, "logout"])->name("logout");

    Route::get("profile", [ProfileController::class, "index"])->name("profile");
    Route::post("profile", [ProfileController::class, "save"])->name("profile.save");
});

Route::group(["middleware" => CheckAdminMiddleware::class], function (){
    Route::get('/setting', [SettingController::class, "index"])->name("setting");
    Route::post('/setting', [SettingController::class, "save"])->name("setting.save");

    Route::prefix("staff")->name("staff.")->group(function (){
        Route::get('/', [StaffController::class, "index"])->name("index");
    });
});
