<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Requests\AdStore;
use App\Mail\AnnonceMarkdownMail;
use App\Models\Agence;
use App\Models\Annonce;
use App\Models\Departement;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $ads = DB::table('annonces')
                   ->where('statut', '=' ,'Publier')
                   ->orderBy('created_at', 'DESC')->paginate((30));
        return view('Home.offreDemploi', compact('ads'));
    }
    // public function annonceIndex()
    // {
    //     //Recuperation des annonces et les affichées par ordre de création
    //     $ads = DB::table('annonces')->orderBy('created_at', 'DESC')->paginate(5);
    //     return view('annonce.index', compact('ads'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reg = DB::table('regions')->get();
        return view('ads.nouvelleAnnonce',compact('reg'));
    }

    public function getDep($regionName)
    {
        $region = Region::where('nomRegion', $regionName)->first();

        $departments = DB::table('regions')
                            ->join('departements','regions.id','=','region_id')
                            ->select('departements.*')
                            ->where('region_id','=',$region->id)
                            ->get();

        $departmentNames = $departments->pluck('nomDepartement')->toArray();

        return $departmentNames;
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

        $region = Region::where('nomRegion','=',$ad->region)->first();

        $ad->region_id = $region->id;

        $ad->save();

        Mail::to(Auth::user()->email)->send(new AnnonceMarkdownMail());
         return back()->with('success', 'Votre annonce a été bien postéé !');
        // return redirect()->back();


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

    // public function getRegionDep(){
    //     $regions = DB::table('regions')->get();
    //     $departements = DB::table('departements')->get();

    //     return view('ads.nouvelleAnnonce',compact('regions','departements'));

    // }
}
