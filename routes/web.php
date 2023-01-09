<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OuvrierController;
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

Route::get('/accueil', [HomeController::class,'accueil'])->name('accueil');

Route::get('/home', [HomeController::class,'redirection'])->name('redirection');

Route::resource('ouvriers', OuvrierController::class);

Route::get('/logout', [LoginController::class, 'logout'])
        ->name('app_logout');

 Route::get('/update', [HomeController::class,'update'])
        ->name('update');

Route::middleware(['auth', 'profil:admin'])->group(function(){
    Route::get('/admin', [HomeController::class, 'admin'])
        ->name('app_admin');
    //
});

<<<<<<< HEAD
=======
//Les routes pour les ouvriers
Route::get('/ouvrier', [OuvrierController::class,'index'])->name('app_ouvrier');


// Les routes pour les annonces !
Route::get('/annonces', [AdController::class, 'index'])->name('ad.index');

>>>>>>> 9372296a9f7400240fc9b5df4f20e81f7a795316
Route::get('/nouvelleAnnonce', [AdController::class,'create'])->name('nouvelleAnnonce');

Route::post('/annonce/create', [AdController::class, 'store'])->name('ad.store');

//php artisan make:controller ProductController --resource --model=Product;
// php artisan make:migration create_products_table --create=products;

