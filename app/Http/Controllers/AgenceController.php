<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Annonce;
use App\Models\Client;
use App\Models\Metier;
use App\Models\Ouvrier;
use App\Models\Service;
use App\Models\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AgenceController extends Controller
{

    public function indexAgent()
    {
        $annonces = DB::table('annonces')
                    ->where('statut','=','publier')
                    ->get();
        return view('Agence.mettreRelation',compact('annonces'));
    }

    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('clients')
            ->join('users', 'users.id', '=', 'id_client')->paginate(10);
        return view('agence.clients.index', compact('clients'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Agence.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(request $request)
    {
        //dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'integer', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'profil' => $request->profil,
            'password' => Hash::make($request->password),
        ]);
        $chefAgence = Client::create([
            'id_chefAgence' => $user->id,
        ]);

        return redirect()->route('agence_agent')
            ->with('success', 'Client created successfully.');
    }

    public function gererToutAnnonces()
    {
        $annonces = DB::table('annonces')
                    ->where('statut','=','en cour')
                    ->get();
        return view('Agence.annonceAgent', compact('annonces'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function show(Agence $agence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function edit(Agence $agence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agence $agence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agence $agence)
    {
        //
    }

    public function publier($id) {
        $data=Annonce::find($id);
        $data->statut = 'Publier';
        $data->save();

        return redirect()->back();

    }

    public function nonPublier($id) {
        $data=Annonce::find($id);
        $data->statut = 'Non Publier';
        $data->save();

        return redirect()->back();

    }

    public function travailTerminer($id) {
        $data=Annonce::find($id);
        $data->statut = 'terminer';
        $data->save();

        // $dispo=Ouvrier::find($idOuv);
        // $dispo->disponibilite = 'disponible';
        // $dispo->save();

        return redirect()->back();
    }

    public function annonceTerminer(){
        return view('Agence.terminer');
    }

    public function annuler($id) {
        $data=Annonce::find($id);
        $data->statut = 'annuler';
        $data->save();

        // $dispo=Ouvrier::find($idOuv);
        // $dispo->disponibilite = 'disponible';
        // $dispo->save();

        return redirect()->back();
    }

    public function voir($id) {
        $data=Annonce::find($id);
        $client = DB::table('users')
                    ->join('annonces','users.id','=','user_id')
                    ->where('users.id','=',$id)
                    ->first();
        return view('Agence.show',compact('client'))->with('datas',$data);
    }

// Choisir un annonce pour creer une relation
    public function relation($id) {
        $ad=Annonce::find($id);
        $annonces=DB::table('ouvriers')
                    ->join('users', 'users.id', '=', 'id_Ouvrier')
                    ->join('metiers', 'ouvrier_id', '=', 'id_Ouvrier')
                    // ->join('annonces','users.id','=','user_id')
                    // ->where('annonces.nombre','=', 1)
                    ->get();
        return view('Agence.relation',compact('annonces'))->with('ads',$ad);
    }

    public function rechercher($id,Request $request){

        $ad=Annonce::find($id);
        $words = $request->input('words');

        $annonces=DB::table('ouvriers')
                    ->join('users', 'users.id', '=', 'id_Ouvrier')
                    ->join('metiers', 'ouvrier_id', '=', 'id_Ouvrier')
                    ->where('profession', 'LIKE', '%'.$words.'%')
                    ->get();

        // $metier =DB::table('metiers')
        //             ->join('users', 'users.id' ,'=', 'ouvrier_id')

        //             ->get();

            // $req2=DB::table('users')
            //         ->join('annonces', 'users.id', '=', 'user_id')
            //         ->join('relations', 'annonces.id', '=', 'annonce_id')
            //         ->get();

            return view('Agence.recherche',compact('annonces'))->with('ads',$ad);

    }

    // public function voirImage($id) {

    //     $data=Annonce::find($id);
    //     return view('Agence.image')->with('datas',$data);
    // }

// Mettre en relation l'ouvrier choisi avec l'annonce
    public function miseRelation($idAnnonce,$idOuvrier){

        $ouvrier=Ouvrier::find($idOuvrier);
        $annonce=Annonce::find($idAnnonce);

        $relation = new Relation();

        $relation->ouvrier_id = $ouvrier->id;
        $relation->annonce_id = $annonce->id;

        $relation->save();

        $ouvrier->disponibilite = 'indisponible';
        $ouvrier->save();

        $annonce->statut = 'en relation';
        $annonce->save();

        $req1=DB::table('ouvriers')
        ->join('users', 'users.id', '=', 'id_Ouvrier')
        ->join('relations', 'ouvriers.id', '=', 'ouvrier_id')
        ->get();

        $req2=DB::table('users')
        ->join('annonces', 'users.id', '=', 'user_id')
        ->join('relations', 'annonces.id', '=', 'relations.annonce_id')
        // ->join('annonces','users.id','=','user_id')
        ->where('annonces.nombre','=', 1)
        ->get();

        return view('Agence.miseRelation',compact('req2'));
    }

    public function relationEnCour(){
        // $annonce = Annonce::find($id);
        $relation = DB::table('users')
                        ->join('annonces','users.id','=','user_id')
                        ->join('relations','annonces.id','=','relations.annonce_id')
                        ->join('ouvriers','ouvriers.id','=','ouvrier_id')
                        ->where('annonces.statut','=','en relation')
                        // ->orWhere('ouvriers.id','=','ouvrier_id')
                        ->get();
        $ouvrier = DB::table('ouvriers')
                        ->join('users','users.id','=','id_Ouvrier')
                        ->join('relations','ouvriers.id','=','ouvrier_id')
                        ->where('ouvriers.disponibilite','=','indisponible')
                        ->get();
                        // ->where()
        return view('Agence.relationEncour',compact('relation','ouvrier'));
    }

    public function gererMetier(){
        $metier = DB::table('users')
                    ->join('ouvriers','users.id','=','id_Ouvrier')
                    ->join('metiers','id_Ouvrier','=','ouvrier_id')
                    ->where('etat','=','en cour')
                    ->get();
        return view('Agence.gererMetier',compact('metier'));
    }

    public function accepterMetier($id){
        $data=Metier::find($id);
        $data->etat = 'accepter';
        $data->save();
    }

    public function refuserMetier($id){
        $data=Metier::find($id);
        $data->etat = 'refuser';
        $data->save();

        return redirect()->back();
    }

    // public function etablit($idOuvrier,$idAnnonce){

    //     $ouvrier = Ouvrier::find($idOuvrier);
    //     $annonce = Annonce::find($idAnnonce);

    //     return view('Agence.miseRelation')->with('ouvriers','annonces',$ouvrier,$annonce);


    // //     $relation = new Relation();

    // //    // $annonce->ouvriers()->attach($ouvrier);


    // //     $relation->ouvrier_id = $ouvrier;
    // //     $relation->annonce_id = $annonce;

    // //     $relation->save();


    //     // $annonce->ouvriers()->attach($ouvrier);
    // }
}
