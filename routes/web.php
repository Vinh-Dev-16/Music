<?php


use App\Http\Controllers\authController;
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

Route::get('/welcome', function () {
    return view('abc');
});
Route::get('register',[authController::class,'register'])->name('register');
Route::post('do-register',[authController::class,'doRegister'])->name('doRegister');

Route::get('login',[authController::class,'login'])->name('login');
Route::post('do-login',[authController::class,'doLogin'])->name('doLogin');
Route::post('logout',[authController::class,'logout'])->name('logout');