<?php

namespace App\Http\Controllers;

use App\Http\Requests\OuvrierStore;
use App\Models\Metier;
use App\Models\Ouvrier;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OuvriersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOn()
    {
        $agent = DB::table('agences')
                    ->join('agents','agences.id','=','agence_id')
                    ->where('id_chefAgence','=',auth()->user()->id)
                    ->get();

        foreach($agent as $reg){

        $ouvriers = DB::table('ouvriers')
                ->join('users','users.id','=','id_Ouvrier')
                ->join('metiers','ouvriers.id_Ouvrier','=','ouvrier_id')
                ->where('region','=',$reg->localite)
                ->get();
    }

       return view('ouvriers.index', compact('ouvriers'));
   }

   public function index()
   {
      //Recuperation des ouvriers
      $ouvriers = DB::table('ouvriers')
                       ->join('users', 'users.id','=','id_Ouvrier')
                       ->join('metiers', 'id_Ouvrier','=', 'ouvrier_id')
                       ->get();
       return view('Home.ouvrier', compact('ouvriers'));
   }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOn()
    {
        return view('ouvriers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOn(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required','integer', 'unique:users'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','string','min:8']
        ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'profil' => $request->profil,
            'password' => Hash::make($request->password),
        ]);
        $ouvriers = Ouvrier::create([
            'id_ouvrier' => $user->id,
        ]);

        return back()->with('success','Ouvrier cr???? avec succes');
    }
    //=======================IBOU=============================
    public function gestionAnnonce()
    {
       //Recuperation des annonces faites par un ouvrier
       $gestAnnonces = DB::table('users')
                        ->join('annonces', 'users.id','=' ,'user_id')
                        ->where('user_id','=',auth()->user()->id)
                        ->get();
        return view('DashboardOuvrier.gererAnnonce', compact('gestAnnonces'));
    }
    public function store(OuvrierStore $request)
    {
        // $ouv = DB::table('ouvriers')
        //                 ->join('users','users.id','=','id_Ouvrier')
        //                 ->where('users.id','=',auth()->user()->id)
        //                 ->get();

        $metier = DB::table('metiers')->get();


        foreach($metier as $m){

            if($m->ouvrier_id === auth()->user()->id){
                return back()->with('error', 'D??sol?? vous avez d??ja un m??tier !');
            }else{

            $validated = $request->validated();

            $ouvier = new Metier();

            $ouvier->profession = $validated['profession'];
            $ouvier->cv = $validated['cv'];
            $ouvier->diplome = $validated['diplome'];
            $ouvier->potentiel = $validated['potentiel'];
            $ouvier->photo = $validated['photo'];
            $ouvier->ouvrier_id = auth()->user()->id;
            $ouvier->region = $validated['region'];

            $ouvier->save();

                return back()->with('success', 'Votre m??tier a ??t?? bien enregitr?? !');
            }

        }


    }

    public function edit($id)
    {
        return view('ouvriers.edit',compact('Ouvrier'));
    }
    public function indexOuvrier(){
        return view('DashboardOuvrier.index');
    }

    public function enCour(){
        $requete=DB::table('clients')
                    ->join('users', 'users.id', '=', 'id_client')
                    ->join('annonces', 'users.id', '=', 'user_id')
                    ->join('relations', 'annonces.id', '=', 'relations.annonce_id')
                    ->join('ouvriers', 'ouvriers.id_Ouvrier', '=', 'ouvrier_id')
                    ->join('contrats','contrats.id','=','contrat_id')
                    // ->select('relations.*')
                    ->select('contrats.*','users.*','annonces.*','relations.*')
                    ->where('ouvrier_id','=',auth()->user()->id)
                    ->where('statut','=','en relation')
                    ->where('etat','=','en cour')
                    ->where('contratOuvrier','=',NULL)
                    ->get();

        // $requete2=DB::table('users')
        // ->join('annonces', 'users.id', '=', 'user_id')
        // ->join('relations', 'annonces.id', '=', 'relations.annonce_id')
        // ->join('ouvriers', 'ouvriers.id_Ouvrier', '=', 'ouvrier_id')
        // ->where('ouvrier_id','=',auth()->user()->id)
        // ->get();
        return view('DashboardOuvrier.enCour',compact('requete'));
    }

    public function terminer(){
        return view('DashboardOuvrier.terminer');
    }
    public function gestAnnonce(){
        return view('DashboardOuvrier.gestAnnonce');
    }

    public function disponibilite(){
        // $ouvrier = Ouvrier::find($id);
        return view('DashboardOuvrier.disponibilite');
    }

    public function dispo($id){
        $user = User::find($id);

        $ouvrier = Ouvrier::where('id_Ouvrier', $user->id)->first();

        $ouvrier->disponibilite = "disponible";
        $ouvrier->save();

        return back()->with('success', 'Vous ??tes actuellement disponible');
    }

    public function indispo($id){
        $user = User::find($id);

        $ouvrier = Ouvrier::where('id_Ouvrier', $user->id)->first();

        $ouvrier->disponibilite = "indisponible";
        $ouvrier->save();

        return back()->with('error', 'Vous ??tes actuellement indisponible');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ouvrier  $ouvrierOu
     * @return \Illuminate\Http\Response
     */
    public function show(Ouvrier $ouvrier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ouvrier  $ouvrierOu
     * @return \Illuminate\Http\Response
     */
    public function editc(Ouvrier $ouvrier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ouvrier  $ouvrierOu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ouvrier $ouvrier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ouvrier  $ouvrierOu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ouvrier $ouvrier)
    {
        //
    }
}
