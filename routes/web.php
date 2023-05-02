<?php

use App\Http\Controllers\Admin\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/../routes/be.php';

Route::get('/', function () {
    return view('welcome');
});
Route::get('register',[userController::class,'register'])->name('register');
Route::post('do-register',[userController::class,'doRegister'])->name('doRegister');

Route::get('login',[userController::class,'login'])->name('login');
Route::post('do-login',[userController::class,'doLogin'])->name('doLogin');