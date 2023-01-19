<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Requests\AdStore;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{

    use PasswordValidationRules;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recuperation des annonces et les affichées par ordre de création
        $ads = DB::table('annonces')->orderBy('created_at', 'DESC')->paginate(5);
        return view('Home.offreDemploi', compact('ads'));
    }
    public function annonceIndex()
    {
        //Recuperation des annonces et les affichées par ordre de création
        $ads = DB::table('annonces')->orderBy('created_at', 'DESC')->paginate(5);
        return view('annonce.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.nouvelleAnnonce');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdStore $request)
    {
        $validated = $request->validated();

        $ad = new Annonce();

        $ad->titre = $validated['titre'];
        $ad->nombre = $validated['nombre'];
        $ad->region = $validated['region'];
        $ad->departement = $validated['departement'];
        $ad->image = $validated['image'];
        $ad->user_id = auth()->user()->id;
        $ad->message = $validated['message'];

        $ad->save();

        return redirect()->route('accueil')->with('success', 'Votre annonce a été bien postéé !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $ad)
    {
        //
    }
}
