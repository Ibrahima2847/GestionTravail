<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
Route::get('/',[HomeController::class,'accueil'])->name('accueil');
Route::get('/apropos',[HomeController::class,'apropos'])->name('apropos');
Route::match(['get','post'],'/admin',[HomeController::class,'admin'])->name('admin');

//Route::match(['get','post'],'/login',[LoginController::class,'login'])->name('login'); 
//Route::match(['get','post'],'/register',[LoginController::class,'register'])->name('register');

