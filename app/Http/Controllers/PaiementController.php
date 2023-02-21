<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Materiel;
use App\Models\Paiement;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Paydunya_Checkout;
use Paydunya_Checkout_Invoice;
use Paydunya_Checkout_Store;
use Paydunya_DirectPay;
use Paydunya_Setup;

require('C:/wamp64/www/gestionTravail/vendor/paydunya-php-master/paydunya.php');

Paydunya_Setup::setMasterKey("ey1KNMM9-zEFy-vbk8-KHLC-YzTstxDnnbdS");
Paydunya_Setup::setPublicKey("test_public_RYb7ZBT3IOyGRy4zrHZUsGTkxCN");
Paydunya_Setup::setPrivateKey("test_private_mV4Pv92SbyPZThefxXZw2GiqAdK");
Paydunya_Setup::setToken("uO0YieMnqwUZ1FHfO10T");
Paydunya_Setup::setMode("test"); // Optionnel en mode test. Utilisez cette option pour les paiements tests.

//Configuration des informations de votre service/entreprise
Paydunya_Checkout_Store::setName("KayJob"); // Seul le nom est requis
Paydunya_Checkout_Store::setTagline("Quelle que soit votre compétence elle sera la bienvenue !");
Paydunya_Checkout_Store::setPhoneNumber("+221 78 012 09 81");
Paydunya_Checkout_Store::setPostalAddress("Thies - Mbour");
Paydunya_Checkout_Store::setLogoUrl("http://127.0.0.1:8000/logo2.png");

// Paydunya_Checkout_Store::setCallbackUrl("http://magasin-le-choco.com/callback_url.php");
class PaiementController extends Controller
{

public function paiement(Request $request) {

    $relation = DB::table('users')
                    ->join('annonces','users.id','=','user_id')
                    ->join('relations','annonces.id','=','relations.annonce_id')
                    ->join('services','relations.id','=','relation_id')
                    ->join('devis','devis.id','=','devis_id')
                    ->join('materiels','devis.id','=','materiels.devis_id')
                    ->where('users.id','=',auth()->user()->id)
                    ->where('statut','=','en relation')
                    ->get();


    foreach($relation as $matos){
         $data[] = $matos;

    $nbMatos = Materiel::join('devis','devis.id','=','devis_id')
                ->where('devis.id','=',$matos->devis_id)
                ->get();

    $nbMateriel = DB::table('materiels')
                    ->join('devis','devis.id','=','devis_id')
                    ->where('devis.id','=',$matos->devis_id)
                    ->get();

    $somme = DB::table('devis')
                ->join('materiels','devis.id','=','devis_id')
                ->where('devis.id','=',$matos->devis_id)
                ->sum('materiels.montant');

    $serv = DB::table('annonces')
                ->join('relations','annonces.id','=','annonce_id')
                ->join('ouvriers','id_Ouvrier','=','ouvrier_id')
                ->join('users','users.id','=','id_Ouvrier')
                ->join('services','relations.id','=','relation_id')
                ->latest('services.created_at')->first();

    $invoice = new Paydunya_Checkout_Invoice();

    for ($i = 0; $i < count($nbMatos); $i++) {
        $invoice->addItem($nbMatos[$i]->description, 1, $nbMatos[$i]->montant, $nbMatos[$i]->montant);
        $invoice->setTotalAmount($somme);
    }


    if($invoice->create()) {

        $paiement = new Paiement();
        $paiement->montant = $somme;
        $paiement->save();

        $service = Service::find($serv->id);
        $service->paiement_id = $serv->id;
        $service->save();

        return redirect($invoice->getInvoiceUrl());

    }else{
        echo $invoice->response_text;
    }

}

$direct_pay = new Paydunya_DirectPay();

if ($direct_pay->creditAccount($serv->email, ($somme-500))) {
    echo $direct_pay->description;
    echo $direct_pay->response_text;
    echo $direct_pay->transaction_id;
}else{
    echo $direct_pay->response_text;
}


}

}
