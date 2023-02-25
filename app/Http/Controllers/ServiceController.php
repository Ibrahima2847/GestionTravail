<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Devis;
use App\Models\Materiel;
use App\Models\Service;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function afficheMatos(){

        // $words = $request->input('words');
        // $metier =DB::table('metiers')
        //             ->join('users', 'users.id' ,'=', 'ouvrier_id')
        //             ->where('profession', 'LIKE', '%'.$words.'%')
        //             ->get();

        $matos = DB::table('devis')->get();
        return response()->json($matos);

        // return view('services.devis',compact('matos'));

    }

    public function getAvis(){
        return view('services.avis');
    }

    public function avis(Request $request){
    $annonceClients = DB::table('users')
                            ->join('annonces', 'users.id','=' ,'user_id')
                            ->where('user_id','=',auth()->user()->id)
                            ->join('relations','annonces.id','=','relations.annonce_id')
                            ->join('services','relations.id','=','relation_id')
                            ->where('avis_id','=',NULL)
                            // ->where('statut','=','terminer')
                            ->latest('services.created_at')->first();

        $avis = new Avis();
        $avis->description = $request['description'];
        $avis->note = $request['note'];
        $avis->save();

        // dd($annonceClients);

        $service = Service::find($annonceClients->id);
        $service->avis_id = $avis->id;
        $service->save();

        return view('DashboardClient.accepte')->with('success','Merci de nous avoir fait confiance');
    }

    public function materiel(){
        return view('services.materiel');
    }

    public function paiement(){
        return view('services.paiement');
    }

    public function devis(){

        $devis = new Devis();
        $devis->save();

        return view('services.devis',compact('devis'));
    }

    public function ajoutDevis(Request $request){

        $devis = DB::table('devis')->latest('created_at')->first();

       $materiels = $request->input('materiel');
       $prix = $request->input('prix');

    for ($i = 0; $i < count($materiels); $i++) {

        $materiel = new Materiel();

        $materiel->description = $materiels[$i];
        $materiel->montant = $prix[$i];
        $materiel->devis_id = $devis->id;
        $materiel->save();
    }

        $relation = DB::table('annonces')
                    ->join('relations','annonces.id','=','annonce_id')
                    ->join('ouvriers','id_Ouvrier','=','ouvrier_id')
                    ->join('services','relations.id','=','relation_id')
                    ->latest('services.created_at')->first();

        $service = Service::find($relation->id);
        $service->devis_id = $devis->id;
        $service->save();


    $materiel = DB::table('materiels')
                ->join('devis','devis.id','=','devis_id')
                ->where('devis.id','=',$devis->id)
                ->get();

    foreach($materiel as $matos){

    $somme = DB::table('devis')
                ->join('materiels','devis.id','=','devis_id')
                ->where('devis.id','=',$matos->devis_id)
                ->sum('materiels.montant');
    }

    $user = User::join('annonces', 'users.id', '=', 'user_id')
                    ->join('relations', 'annonces.id', '=', 'relations.annonce_id')
                    ->join('ouvriers', 'ouvriers.id_Ouvrier', '=', 'ouvrier_id')
                    ->where('ouvrier_id','=',auth()->user()->id)
                    ->where('statut','=','en relation')
                    ->where('etat','=','en cour')
                    ->first();

    $logoPath = public_path('./assets/img/logo.png');

    // Nom de l'entreprise
    $entreprise = 'KayJob';

    // Date d'aujourd'hui
    $date = date('d/m/Y');

    // Générer le PDF
    $dompdf = new Dompdf();
    $html = '<html>
    <head>
        <style>
            /* Styles pour le document */
            body {
                font-family: sans-serif;
                margin: 0;
                padding: 0;
            }
            .header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px;
                background-color: #eee;
            }
            .logo {
                width: 100px;
            }
            h1 {
                font-size: 24px;
                margin: 0;
            }
            .date {
                font-size: 16px;
                margin: 0;
            }
            .entreprise {
                font-size: 20px;
                font-weight: bold;
                margin: 20px 0;
            }
            .total {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <img src="'.$logoPath.'" class="logo" />
            <div>
                <h1>Mon document PDF</h1>
                <p class="date">'.$date.'</p>
            </div>
        </div>
        <div class="entreprise">'.$entreprise.'</div>
        <div class="entreprise">'."Devis sur les materiels".'</div>
        <table border="2" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($materiel as $donnee) {
                $html .= '<tr>
                    <td>'.$donnee->id.'</td>
                    <td>'.$donnee->description.'</td>
                    <td>'.$donnee->montant.'</td>
                </tr>';
            }
            $html .= '
            <tr class="total">
                <td colspan="3">Total</td>
                <td>'.$somme.'</td>
        </tr>
        </tbody>
        </table>
    </body>
</html>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdf = $dompdf->output();

        // Envoyer le PDF par email
        $pdfData = base64_encode($pdf);
        Mail::send([], [], function ($message) use ($pdfData, $user) {
            $message->to($user->email)
                    ->subject('Mon document PDF')
                    ->attachData(base64_decode($pdfData), 'document.pdf');
        });

       return view('DashboardOuvrier.index')->with('success','Votre devis a été enregistré et envoyé avec succes');

    }

    public function devisService(){
        $devis = DB::table('devis')
                ->join('materiels','devis.id','=','devis_id')
                ->get();
    }
}
