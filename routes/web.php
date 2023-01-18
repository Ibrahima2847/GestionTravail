<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OuvrierController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\AgentsController;
use App\Http\Controllers\AgenceController;
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

//Route::get('/accueil', [HomeController::class,'accueil'])->name('accueil');

Route::get('/home', [HomeController::class,'redirection'])->name('redirection');

Route::resource('ouvriers', OuvrierController::class);

Route::get('/logout', [LoginController::class, 'logout'])->name('app_logout');

 Route::get('/update', [HomeController::class,'update'])->name('update');

Route::middleware(['auth', 'profil:admin'])->group(function(){
    Route::get('/admin', [HomeController::class, 'admin'])
        ->name('app_admin');
});

//==================Les routes pour les ouvriers ===================================//
Route::get('/ouvrier', [OuvrierController::class,'index'])->name('app_ouvrier');
Route::get('/metier', [HomeController::class,'metier'])->name('metier');
Route::get('/changerMotPasse', [HomeController::class,'changer'])->name('changer');
Route::get('/indexOuvrier', [OuvrierController::class,'indexOuvrier'])->name('indexOuvrier');
Route::get('/enCour', [OuvrierController::class,'enCour'])->name('enCour');
Route::get('/terminer', [OuvrierController::class,'terminer'])->name('terminer');
Route::get('/gestAnnonce', [OuvrierController::class,'gestAnnonce'])->name('gestAnnonce');
Route::get('/gestionOuvrier', [OuvrierController::class,'gestionIndex'])->name('gest_ouvrier');
Route::get('/createOuvrier', [OuvrierController::class,'create'])->name('create_ouvrier');
Route::get('/store', [OuvrierController::class,'store'])->name('ouvriers');

//============================Routes pour les clients =================================//
Route::get('/gestionClient', [ClientsController::class, 'index'])->name('gest_client');
Route::get('/createClient', [ClientsController::class,'create'])->name('create_client');
Route::post('/store', [ClientController::class,'refuse'])->name('refuse');
Route::post('/storeClient', [ClientController::class,'store'])->name('clients');
//Route::get('/changerMotPasse_client', [ClientController::class,'changer'])->name('changer_client');

//================================Routes pour les agents==================================//
Route::get('/gestionAgent', [AgentsController::class,'index'])->name('gest_agent');
Route::get('/createAgent', [AgentsController::class,'create'])->name('create_agent');
//Route::post('/store', [AgentsController::class,'store'])->name('store');
Route::post('/store', [AgentsController::class,'store'])->name('agents');

//================================Routes pour les Agence ==============================//
Route::get('/AgenceClient', [AgenceController::class,'index'])->name('agence_client');
Route::get('/AgenceCreate', [AgenceController::class,'create'])->name('agence_create');
Route::post('/storeClients', [AgenceController::class,'store'])->name('agence');
//===========================Les routes pour les annonces ========================//
Route::get('/annonces', [AdController::class, 'index'])->name('ad.index');
Route::get('/nouvelleAnnonce', [AdController::class,'create'])->name('nouvelleAnnonce');
Route::post('/annonce/create', [AdController::class, 'store'])->name('ad.store');

//php artisan make:controller ProductController --resource --model=Product;     
// php artisan make:migration create_products_table --create=products;

