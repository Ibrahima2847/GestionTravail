<?php

namespace App\Http\Controllers;

use App\Http\Requests\OuvrierStore;
use App\Models\Metier;
use App\Models\Ouvrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OuvriersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOn()
    {
        //Recuperation des ouvriers
       $ouvriers = DB::table('ouvriers')
       ->join('users', 'users.id','=' ,'id_ouvrier')->paginate(10);
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
            'id_ouvrier' => $user->id,]);

        return redirect()->route('gest_ouvrier')
                        ->with('success','Ouvrier created successfully.');
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
    public function store(Ouvrier $request)
    {

        $validated = $request->validated();

        $ouvier = new Metier();

        $ouvier->profession = $validated['profession'];
        $ouvier->cv = $validated['cv'];
        $ouvier->diplome = $validated['diplome'];
        $ouvier->potentiel = $validated['potentiel'];
        $ouvier->photo = $validated['photo'];
        $ouvier->ouvrier_id = auth()->user()->id;

        $ouvier->save();

        return redirect()->route('app_ouvrier')->with('success', 'Votre métier a été bien enregitré !');
    }
    public function edit($id)
    {
        return view('ouvriers.edit',compact('Ouvrier'));
    }
    public function indexOuvrier(){
        return view('DashboardOuvrier.index');
    }

    public function enCour(){
        return view('DashboardOuvrier.enCour');
    }

    public function terminer(){
        return view('DashboardOuvrier.terminer');
    }
    public function gestAnnonce(){
        return view('DashboardOuvrier.gestAnnonce');
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
