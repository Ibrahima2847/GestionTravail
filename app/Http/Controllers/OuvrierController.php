<?php

namespace App\Http\Controllers;

use App\Http\Requests\OuvrierStore;
use App\Models\Metier;
use App\Models\Ouvrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OuvrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //Recuperation des ouvriers
       $ouvriers = DB::table('ouvriers')
                        ->join('users', 'users.id','=' ,'id_Ouvrier')
                        ->join('metiers', 'id_Ouvrier', '=', 'ouvrier_id')
                        ->get();
       //$ouvriers = Ouvrier::find(1)->metier;
        return view('Home.ouvrier', compact('ouvriers'));
    }

    public function gestionIndex()
    {
       //Recuperation des ouvriers
       $ouvriers = DB::table('ouvriers')
                        ->join('users', 'users.id','=' ,'id_Ouvrier')->paginate(10);
        return view('ouvriers.index', compact('ouvriers'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('ouvriers.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OuvrierStore $request)
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

        return redirect()->route('accueil')->with('success', 'Votre métier a été bien enregitré !');
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
}
