<?php

namespace App\Http\Controllers;

use App\Mail\AnnonceMarkdownMail;
use App\Mail\ClientMarkdownMail;
use App\Mail\OuvrierMarkdownMail;
use App\Models\Agence;
use App\Models\Annonce;
use App\Models\Client;
use App\Models\Contrat;
use App\Models\Devis;
use App\Models\Metier;
use App\Models\Ouvrier;
use App\Models\Service;
use App\Models\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AgenceController extends Controller
{

    public function indexAgent()
    {
        $agent = DB::table('agences')
                    ->join('agents','agences.id','=','agence_id')
                    ->join('users','users.id','=','id_chefAgence')
                    ->where('id_chefAgence','=',auth()->user()->id)
                    ->get();

        foreach($agent as $reg){
        $annonces = DB::table('annonces')
                    ->where('annonces.region', '=', $reg->localite)
                    ->where('statut','=','publier')
                    ->get();
        }

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
                'name' => ['required', 'string', 'max:255','alpha', 'regex:/^[a-zA-Z]+$/'],
                'prenom' => ['required', 'string', 'max:255','alpha', 'regex:/^[a-zA-Z]+$/'],
                'telephone' => ['required','integer','starts_with:77,76,75,70,78,33', Rule::unique(User::class),],
                'email' => ['required','string','email','max:255',Rule::unique(User::class),],
            ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'profil' => $request->profil,
            'password' => Hash::make($request->password),
        ]);
        $client = Client::create([
            'id_client' => $user->id,
        ]);

        return back()->with('success', 'Client cr??er avec succes');
    }

    public function gererToutAnnonces()
    {

        $agent = DB::table('agences')
                        ->join('agents','agences.id','=','agence_id')
                        ->join('users','users.id','=','id_chefAgence')
                        ->where('id_chefAgence','=',auth()->user()->id)
                        ->get();

        foreach($agent as $reg){

            $annonces = DB::table('annonces')
                        ->where('annonces.region', '=', $reg->localite)
                        ->where('statut','=','en cour')
                        ->get();

        }

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
        return back()->with('success', 'Annonce publi?? avec succes');

    }

    public function nonPublier($id) {

        $data=Annonce::find($id);
        $data->statut = 'Non Publier';
        $data->save();

        return back()->with('success', 'Annonce non publi?? avec succes');


    }


    public function travailTerminer($id) {
        $data=Relation::find($id);
        $ouvrier = Ouvrier::where('id_Ouvrier','=',$data->ouvrier_id)
                        ->first();

        $data->etat = 'terminer';
        $data->save();

        $ouvrier->disponibilite = 'disponible';
        $ouvrier->save();

        return back()->with('success', 'Travail termin?? avec succes');

    }

    public function annonceTerminer(){

        $agent = DB::table('agences')
                        ->join('agents','agences.id','=','agence_id')
                        ->join('users','users.id','=','id_chefAgence')
                        ->where('id_chefAgence','=',auth()->user()->id)
                        ->get();

        foreach($agent as $reg){

        $relation = DB::table('services')
                        ->join('relations','relations.id','=','relation_id')
                        ->join('contrats','contrats.id','=','contrat_id')
                        ->join('annonces','annonces.id','=','relations.annonce_id')
                        ->join('users','users.id','=','user_id')
                        ->where('region','=',$reg->localite)
                        ->where('paiement_id','<>',NULL)
                        ->where('etat','=','en cour')
                        ->select('contrats.*','services.*','annonces.*','users.*','relations.*')
                        ->get();
        }

        // dd($relation);
        return view('Agence.terminer',compact('relation'));
    }

    public function annuler($id) {
        $data=Annonce::find($id);
        $data->statut = 'annuler';
        $data->save();

        return back()->with('success', 'Annulation r??ussi');

    }

    public function voir($id) {
        $data=Annonce::find($id);
        $client = DB::table('users')
                    ->join('annonces','users.id','=','user_id')
                    ->where('annonces.id','=',$id)
                    ->get();
        return view('Agence.show',compact('client'))->with('datas',$data);
    }

// Choisir un annonce pour creer une relation
    public function relation($id) {

        $ad=Annonce::find($id);

        $agent = DB::table('agences')
                        ->join('agents','agences.id','=','agence_id')
                        ->join('users','users.id','=','id_chefAgence')
                        ->where('id_chefAgence','=',auth()->user()->id)
                        ->get();

        foreach($agent as $reg){

            $annonces=DB::table('ouvriers')
                        ->join('users', 'users.id', '=', 'id_Ouvrier')
                        ->join('metiers', 'ouvrier_id', '=', 'id_Ouvrier')
                        ->where('region','=',$reg->localite)
                        ->where('disponibilite','=','disponible')
                        ->get();
        }

        return view('Agence.relation',compact('annonces'))->with('ads',$ad);
    }

    public function rechercher($id,Request $request){


        // $request->validate([
        //     'words' => ['required', 'string', 'max:255','alpha', 'regex:/^[a-zA-Z]+$/'],
        // ]);

        $ad=Annonce::find($id);

        $words = $request->input('words');

        $agent = DB::table('agences')
                        ->join('agents','agences.id','=','agence_id')
                        ->join('users','users.id','=','id_chefAgence')
                        ->where('id_chefAgence','=',auth()->user()->id)
                        ->get();

        foreach($agent as $reg){

        $annonces=DB::table('ouvriers')
                        ->join('users', 'users.id', '=', 'id_Ouvrier')
                        ->join('metiers', 'ouvrier_id', '=', 'id_Ouvrier')
                        ->where('profession', 'LIKE', '%'.$words.'%')
                        ->where('region','=',$reg->localite)
                        ->where('disponibilite','=','disponible')
                        ->get();
        }

            return view('Agence.recherche',compact('annonces'))->with('ads',$ad);

    }

// Mettre en relation l'ouvrier choisi avec l'annonce
    public function miseRelation($idAnnonce,$idOuvrier){
        $ouvrier = Ouvrier::find($idOuvrier);
        $annonce=Annonce::find($idAnnonce);

        $ouvrier1 = Ouvrier::join('users','users.id','=','id_Ouvrier')
                            ->where('id_Ouvrier','=',$ouvrier->id_Ouvrier)
                            ->first();

        $client = Client::join('users','users.id','=','id_client')
                            ->join('annonces','users.id','=','user_id')
                            ->where('annonces.id','=',$annonce->id)
                            ->first();


        $relation = new Relation();

        $relation->ouvrier_id = $ouvrier->id_Ouvrier;
        $relation->annonce_id = $annonce->id;

        $contrat = new Contrat();
        $contrat->save();

        $relation->contrat_id = $contrat->id;

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
        ->where('annonces.nombre','=', 1)
        ->get();

        $service = new Service();
        $service->relation_id = $relation->id;
        $service->save();

        Mail::to($ouvrier1->email)->send(new OuvrierMarkdownMail());
        Mail::to($client->email)->send(new ClientMarkdownMail());

        return view('Agence.miseRelation',compact('req2'));
    }

    public function relationEnCour(){

        $agent = DB::table('agences')
                        ->join('agents','agences.id','=','agence_id')
                        ->join('users','users.id','=','id_chefAgence')
                        ->where('id_chefAgence','=',auth()->user()->id)
                        ->get();

        foreach($agent as $reg){

        $relation = DB::table('services')
                        ->join('relations','relations.id','=','relation_id')
                        ->join('annonces','annonces.id','=','relations.annonce_id')
                        ->join('users','users.id','=','user_id')
                        ->where('region','=',$reg->localite)
                        ->where('statut','=','en relation')
                        ->where('devis_id','=',NULL)
                        ->get();
        }

        // dd($relation);
        return view('Agence.relationEncour')->with('relations',$relation);
    }

    public function gererMetier(){

        // $region = DB::table('agences')
        //                 ->join('regions','regions.id','=','region_id')
        //                 ->get();
        // dd($region);
        // foreach($region as $reg){
        $metier = DB::table('users')
                    ->join('ouvriers','users.id','=','id_Ouvrier')
                    ->join('metiers','id_Ouvrier','=','ouvrier_id')
                    ->join('regions','regions.NomRegion','=','region')
                    ->where('etat','=','en cour')
                    ->select('users.*','metiers.*')
                    ->get();
        // }

        // dd($metier);

        return view('Admin.gererMetier',compact('metier'));
    }

    public function accepterMetier($id){
        $data=Metier::find($id);
        $data->etat = 'accepter';
        $data->save();

        return back()->with('success', 'Demande de m??tier accept??');
    }

    public function refuserMetier($id){
        $data=Metier::find($id);
        $data->etat = 'refuser';
        $data->save();

        return back()->with('error', 'Demande de m??tier refus??');

    }

}
