<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\gestClient;
use App\Http\Controllers\gestionClientController;
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
Route::get('/home', [HomeController::class,'redirection'])->name('redirection');
Route::get('/logout', [LoginController::class, 'logout'])->name('app_logout');
 Route::get('/update', [HomeController::class,'update'])->name('update');

Route::middleware(['auth', 'profil:admin'])->group(function(){
    Route::get('/admin', [HomeController::class, 'admin'])
        ->name('app_admin');
    //
});

Route::get('/metier', [HomeController::class,'metier'])->name('metier');
Route::get('/changerMotPasse', [HomeController::class,'changer'])->name('changer');

//Les routes pour les ouvriers
Route::get('/ouvrier', [OuvrierController::class,'index'])->name('app_ouvrier');
Route::get('/indexOuvrier', [OuvrierController::class,'indexOuvrier'])->name('indexOuvrier');
Route::get('/enCour', [OuvrierController::class,'enCour'])->name('enCour');
Route::get('/terminer', [OuvrierController::class,'terminer'])->name('terminer');
Route::get('/gestAnnonce', [OuvrierController::class,'gestAnnonce'])->name('gestAnnonce');
Route::resource('ouvriers', OuvrierController::class);
Route::get('/gestionOuvrier', [OuvrierController::class,'gestionIndex'])->name('gest_ouvrier');
Route::post('/metier/create', [OuvrierController::class, 'store'])->name('ouvrier.store');


//Routes pour les clients
Route::get('/gestionClient', [gestionClientController::class,'indexClient'])->name('indexClient');
Route::get('/accepte', [gestionClientController::class,'accepte'])->name('accepte');
Route::get('/refuse', [gestionClientController::class,'refuse'])->name('refuse');
Route::get('/gestAnnoceCl', [gestionClientController::class,'gestAnnonce'])->name('gestAnnonce_client');
Route::get('/changerMotPasse_client', [gestionClientController::class,'changer'])->name('changer_client');

// Les routes pour les annonces !
Route::get('/annonces', [AdController::class, 'index'])->name('ad.index');
Route::get('/nouvelleAnnonce', [AdController::class,'create'])->name('nouvelleAnnonce');
Route::post('/annonce/create', [AdController::class, 'store'])->name('ad.store');

//php artisan make:controller ProductController --resource --model=Product;
// php artisan make:migration create_products_table --create=products;

