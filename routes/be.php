<?php

use App\Http\Controllers\admin\permissionController;
use App\Http\Controllers\Admin\roleController;
use App\Http\Controllers\Admin\userController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|editor|managers']] ,function () {
    Route::get('dashboard',[userController::class,'dashBoard'])->name('dashboard');
    // Route CRUD user
    Route::group(['prefix' => 'user', 'middleware' => ['role:admin']] , function () {
    Route::get('index',[userController::class,'index'])->name('admin.user.index');
    });
    Route::group(['prefix' => 'role', 'middleware' => ['role:admin|managers']] , function () {
        Route::get('index',[roleController::class,'index'])->name('admin.role.index');
        Route::get('create',[roleController::class,'create'])->name('admin.role.create');
        Route::post('store',[roleController::class,'store'])->name('admin.role.store');
        Route::get('edit/{id}',[roleController::class,'edit'])->name('admin.permission.edit');
        Route::patch('update/{id}',[roleController::class,'update'])->name('admin.role.update');
        Route::get('destroy/{id}',[roleController::class,'destroy'])->name('admin.role.destroy');
    });
    Route::group(['prefix' => 'permission', 'middleware' => ['role:admin|managers']], function () {
        Route::get('index', [permissionController::class, 'index'])->name('admin.permission.index');
        Route::get('create',[permissionController::class,'create'])->name('admin.permission.create');
        Route::post('store',[permissionController::class,'store'])->name('admin.permission.store');
        Route::get('edit/{id}',[permissionController::class,'edit'])->name('admin.permission.edit');
        Route::patch('update/{id}',[permissionController::class,'update'])->name('admin.permission.update');
        Route::get('destroy/{id}',[permissionController::class,'destroy'])->name('admin.permission.destroy');
    });
});