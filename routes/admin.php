<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('login',[AdminController::class,'login_form'])->name('login');
        Route::post('login',[AdminController::class,'login_functionality'])->name('login.functionality');
    });

    Route::group(['middleware' => ['auth:admin']], function () {
        
        Route::get('logout',[AdminController::class,'logout'])->name('logout');

        Route::get('/', function () {
          return to_route('admin.dashboard');
        });
    
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    });
});
