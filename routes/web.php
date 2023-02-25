<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\OuvriersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgentsController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ChefAgnceController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\gestClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PdfController;
use App\Models\Paiement;
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

//==========================Les routes pour les Homes ===============================
Route::get('/',[HomeController::class,'accueil'])->name('accueil');
Route::get('/apropos',[HomeController::class,'apropos'])->name('apropos');
Route::get('/accueil', [HomeController::class,'accueil'])->name('accueil');
Route::get('/gestion/chefAgence', [HomeController::class,'gestChefAgence'])->name('gestChefAgence');
Route::get('/gestion/Agence', [HomeController::class,'gestAgence'])->name('gestAgence');
Route::get('/chefAgence/affectation', [HomeController::class,'affectation'])->name('affectation');
Route::post('/chefAgence/create', [HomeController::class,'createChefAgence'])->name('create.chefAgence');
Route::post('/Agence/create', [HomeController::class,'createAgence'])->name('create.Agence');
Route::get('/Agence/listeAgence/{id}', [HomeController::class,'toutAgence'])->name('toutAgence');
Route::post('/Affectation/{id}{idAgence}', [HomeController::class,'affecter'])->name('affecter');

Route::post('/AffecterAgent/{id}', [ChefAgnceController::class,'affecterAgent'])->name('affecterAgent');
Route::get('/agent/affectation', [ChefAgnceController::class,'getAgent'])->name('getAgent');


// Route::get('/relation/{id}', [AgenceController::class,'relation'])->name('relation');

Route::post('/agent/create', [ChefAgnceController::class,'createAgent'])->name('create.agent');
Route::get('/ajouter/agent', [ChefAgnceController::class,'gestAgent'])->name('gestAgent');
Route::get('/gestion/agent', [ChefAgnceController::class,'toutAgent'])->name('toutAgent');










Route::get('/logout', [LoginController::class, 'logout'])->name('app_logout');
Route::get('/accueil', [HomeController::class,'accueil'])->name('accueil');
Route::resource('ouvriers', OuvrierController::class);
Route::get('/logout', [LoginController::class, 'logout'])->name('app_logout');

//Route::get('/update', [HomeController::class,'update'])->name('update');
Route::get('/home', [HomeController::class,'redirection'])->name('redirection');
Route::get('/accueil', [HomeController::class,'accueil'])->name('accueil');
Route::get('/metier', [HomeController::class,'metier'])->name('metier');
Route::get('/changerMotPasse', [HomeController::class,'changer'])->name('changer');
Route::get('/gestion/agence', [HomeController::class,'listeAgence'])->name('listeAgence');
Route::get('/gestion/chef', [HomeController::class,'listeChef'])->name('listeChef');

Route::get('/getRegion',[ServiceController::class,'getRegion']);

//Route::get('/accueil', [HomeController::class,'accueil'])->name('accueil');
Route::middleware(['auth', 'profil:admin'])->group(function(){
    Route::get('/admin', [HomeController::class, 'admin'])
        ->name('app_admin');
});


//==================Les routes pour les ouvriers ===================================//

Route::resource('ouvriers', OuvriersController::class);
Route::get('/ouvrier', [OuvriersController::class,'index'])->name('app_ouvrier');
Route::get('/gestionOuvrier', [OuvriersController::class,'indexOn'])->name('gest_ouvrier');
Route::get('/createOuvrier', [OuvriersController::class,'createOn'])->name('create_ouvrier');
Route::post('/ajouter/Ouvrier', [OuvriersController::class,'storeOn'])->name('ouvriers');
Route::get('/gestAnnonce', [OuvriersController::class,'gestAnnonce'])->name('gestAnnonce');
Route::post('/metierCreate', [OuvriersController::class, 'store'])->name('ouvrier.store');
Route::get('/enCour', [OuvriersController::class,'enCour'])->name('enCour');
Route::get('/terminer', [OuvriersController::class,'terminer'])->name('terminer');
Route::get('/disponibilite', [OuvriersController::class,'disponibilite'])->name('disponibilite');
Route::get('/disponible/{id}', [OuvriersController::class,'dispo'])->name('dispo');
Route::get('/indisponible/{id}', [OuvriersController::class,'indispo'])->name('indispo');



//Route::get('/indexOuvrier', [OuvriersController::class,'indexOuvrier'])->name('indexOuvrier');
//Les routes pour les annonces !
//Route::get('/gestAnnonce', [OuvriersController::class,'gestAnnonce'])->name('gestAnnonce');
//Route::get('/gestionOuvrier', [OuvrierController::class,'gestionIndex'])->name('gest_ouvrier');
//Route::get('/create', [OuvrierController::class,'create'])->name('create');




//================================= Les routes pour les annonces ========================
//Route::get('/ouvrier', [OuvrierController::class,'index'])->name('app_ouvrier');
// Route::get('/metier', [HomeController::class,'metier'])->name('metier');
//Route::get('/ouvrier/gererAnnonce', [HomeController::class,'annonceOuvrier'])->name('ouvrierAnnonce');
//Route::get('/changerMotPasse', [HomeController::class,'changer'])->name('changer');

//Les routes pour les ouvriers
//Route::get('/ouvrier', [OuvrierController::class,'index'])->name('app_ouvrier');
// Route::get('/gestAnnonce', [OuvrierController::class,'gestAnnonce'])->name('gestAnnonce');
//Route::resource('ouvriers', OuvrierController::class);
// Route::get('/gestionOuvrier', [OuvrierController::class,'gestionIndex'])->name('gest_ouvrier');
Route::get('/metier/annonce', [OuvriersController::class, 'gestionAnnonce'])->name('ouvrier.annonce');
Route::get('/indexOuvrier', [OuvriersController::class,'indexOuvrier'])->name('indexOuvrier');

// Route::prefix('annonces')->group(function () {
//     Route::get('/', 'AdminController@ads')->name('admin.ads');
//     Route::middleware('ajax')->group(function () {
//         Route::post('approve/{ad}', 'AdminController@approve')->name('admin.approve');
//         Route::post('refuse', 'AdminController@refuse')->name('admin.refuse');
//     });
// });


//Routes pour les clients
Route::get('/gestioClient', [gestClientController::class,'indexClient'])->name('indexClient');
Route::get('/accepte', [gestClientController::class,'accepte'])->name('accepte');
Route::get('/refuse', [gestClientController::class,'refuse'])->name('refuse_client');
Route::get('/gestAnnoceCl', [gestClientController::class,'gestAnnonce'])->name('gestAnnonce_client');
Route::get('/changerMotPasse_client', [gestClientController::class,'changer'])->name('changer_client');



//============================Routes pour les clients =================================//
Route::get('/gestionClient',[ClientsController::class, 'indexOn'])->name('gest_client');
Route::get('/createClient',[ClientsController::class,'createOn'])->name('create_client');
Route::post('/store',[ClientsController::class,'refuse'])->name('refuse');
Route::post('/storeClient',[ClientsController::class,'storeOn'])->name('clients');
//Route::get('/changerMotPasse_client', [ClientController::class,'changer'])->name('changer_client');

//================================Routes pour les agents==================================//
Route::get('/gestionAgent', [AgentsController::class,'indexOn'])->name('gest_agent');
Route::get('/createAgent', [AgentsController::class,'createOn'])->name('create_agent');
//Route::post('/store', [AgentsController::class,'store'])->name('store');
Route::post('/store', [AgentsController::class,'storeOn'])->name('agents');
Route::get('/store', [AgentsController::class,'refuse'])->name('refuse_agent');

//================================Routes pour les Agence ==============================//
Route::get('/AgenceClient', [AgenceController::class,'index'])->name('agence_client');
Route::get('/AgenceCreate', [AgenceController::class,'create'])->name('agence_create');
Route::post('/storeClients', [AgenceController::class,'store'])->name('agence');
Route::get('/rechercher/{id}', [AgenceController::class,'rechercher'])->name('rechercher');
Route::get('/gerer/TousAnnonces', [AgenceController::class,'gererToutAnnonces'])->name('gererToutAnnonce');
Route::get('/accueil/miseRelation', [AgenceController::class,'indexAgent'])->name('indexAgent');
Route::get('/relationEnCour', [AgenceController::class,'relationEnCour'])->name('relationEnCour');

Route::get('/publier/{id}', [AgenceController::class,'publier'])->name('publier');
Route::get('/travailTerminer/{id}', [AgenceController::class,'travailTerminer'])->name('travailTerminer');
// Route::get('/annonce/terminer/{id}{$idOuv}', [AgenceController::class,'annonceTerminer'])->name('annonceTerminer');
Route::get('/annuler/{id}', [AgenceController::class,'annuler'])->name('annuler');
Route::get('/nonPublier/{id}', [AgenceController::class,'nonPublier'])->name('nonPublier');
Route::get('/voir/{id}', [AgenceController::class,'voir'])->name('voir');
Route::get('/gerer/metiers', [AgenceController::class,'gererMetier'])->name('gererMetier');
Route::get('/accepterMetier/{id}', [AgenceController::class,'accepterMetier'])->name('accepterMetier');
Route::get('/refuserMetier/{id}', [AgenceController::class,'refuserMetier'])->name('refuserMetier');



// Choisir une annonce pour creer une relation
Route::get('/relation/{id}', [AgenceController::class,'relation'])->name('relation');
// Mettre en relation l'ouvrier choisi avec l'annonce
Route::post('/MiseEnRelation/{idAnnonce}{idOuvrier}', [AgenceController::class,'miseRelation'])->name('miseRelation');
// Route::post('/etablit/{$idOuvrier}{$idAnnonce}', [AgenceController::class,'etablit'])->name('etablit');

// Route::get('/MiseEnRelation', [AgenceController::class,'miseRelation'])->name('miseRelation');
// Route::get('/voirImage/{id}', [AgenceController::class,'voirImage'])->name('voirImage');




// Route::prefix('annonces')->group(function () {
//     Route::get('/agent/ads', [AgenceController::class,'ads'])->name('agent.ads');
//     Route::middleware('ajax')->group(function () {
//         Route::post('approve/{ad}', [AgenceController::class,'approve'])->name('agent.approve');
//         Route::post('refuse', [AgenceController::class,'refuse'])->name('agent.refuse');
//     });
// });





//Route::get('/gestionAgent', [AgentsController::class,'index'])->name('gest_agent');
//Route::get('/create', [AgentsController::class,'create'])->name('create');


//===========================Les routes pour les annonces ========================//
Route::get('/annonces', [AdController::class, 'index'])->name('ad.index');
Route::get('/nouvelleAnnonce', [AdController::class,'create'])->name('nouvelleAnnonce');
Route::post('/annonce/create', [AdController::class, 'store'])->name('ad.store');
Route::get('/departments/{regionName}', [AdController::class,'getDep']);



//======================= Routes pour Service ===============================
Route::get('/materiel',[ServiceController::class,'materiel'])->name('materiel');
Route::post('/devis',[ServiceController::class,'devis'])->name('devis');
Route::get('/afficheMatos',[ServiceController::class,'afficheMatos'])->name('afficheMatos');
Route::get('/paiement',[ServiceController::class,'paiement'])->name('paiement');
Route::get('/faireAvis',[ServiceController::class,'getAvis'])->name('getAvis');
Route::post('/avis',[ServiceController::class,'avis'])->name('avis');

Route::post('/facturation',[PaiementController::class,'paiement'])->name('payer');

Route::post('/enregistrer/materiel',[ServiceController::class,'ajoutDevis'])->name('ajoutDevis');
Route::post('/enregistrer/devis',[ServiceController::class,'getDevis'])->name('getDevis');

//============================ Route pour les Emails =============================
Route::get('/email',[EmailController::class,'bar'])->name('email');

//============================ Route pour les PDF ================================

Route::get('/pdf',[PdfController::class,'generatePdf']);

Route::get('/image', function () {
    return view('Agence.image');
});
