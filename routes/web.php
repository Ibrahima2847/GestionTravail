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
Route::get('/accueil', [HomeController::class,'accueil'])->name('accueil');

Route::get('/nouvelleAnnonce',[HomeController::class,'newAnnonce'])->name('nouvelleAnnonce');

Route::get('/accueil', [HomeController::class,'accueil'])->name('accueil');

Route::get('/home', [HomeController::class,'redirection'])->name('redirection');

Route::get('/logout', [LoginController::class, 'logout'])
        ->name('app_logout');

// Route::get('/accueil', [HomeController::class,'accueil'])
//         ->name('accueil');


Route::middleware(['auth', 'profil:admin'])->group(function(){
    Route::get('/admin', [HomeController::class, 'admin'])
        ->name('app_admin');
    //
});

//Route::match(['get','post'],'/login',[LoginController::class,'login'])->name('login');
//Route::match(['get','post'],'/register',[LoginController::class,'register'])->name('register');

