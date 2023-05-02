<?php

use App\Http\Controllers\Admin\userController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'] ,function () {
    // Route CRUD user
    Route::group(['prefix' => 'user'] , function () {
    Route::get('index',[userController::class,'index'])->name('admib.user.index');
    });

});
