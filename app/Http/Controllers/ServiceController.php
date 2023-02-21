<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Devis;
use App\Models\Materiel;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        ->where('statut','=','terminer')
        ->latest('services.created_at')->first();

        $avis = new Avis();
        $avis->description = $request['description'];
        $avis->note = $request['note'];
        $avis->save();

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

       return view('DashboardOuvrier.index');

    }

    public function devisService(){
        $devis = DB::table('devis')
                ->join('materiels','devis.id','=','devis_id')
                ->get();
    }
}
