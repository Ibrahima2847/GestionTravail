<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class gestClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('clients')
            ->join('users', 'users.id','=' ,'id_client')->paginate(10);
        return view('clients.index', compact('clients'));
    }

    public function indexClient(){

        $annonceClients = DB::table('users')
                        ->join('annonces', 'users.id','=' ,'user_id')
                        ->join('relations','annonces.id','=','relations.annonce_id')
                        ->join('services','relations.id','=','relation_id')
                        ->where('user_id','=',auth()->user()->id)
                        ->where('paiement_id','=',NULL)
                        ->where('statut','=','en relation')
                        ->where('etat','=','en cour')
                        ->get();
        // dd($annonceClients);

        return view('DashboardClient.index',compact('annonceClients'));
    }

    public function accepte(){
        $annonces = DB::table('users')
                        ->join('annonces', 'users.id','=' ,'user_id')
                        ->where('user_id','=',auth()->user()->id)
                        ->get();
        return view('DashboardClient.accepte', compact('annonces'));
    }

    public function refuse(){
        $annonces = DB::table('users')
                        ->join('annonces', 'users.id','=' ,'user_id')
                        ->join('relations','annonces.id','=','relations.annonce_id')
                        ->join('services','relations.id','=','relation_id')
                        ->where('user_id','=',auth()->user()->id)
                        ->where('avis_id','=',NULL)
                        // ->where('etat','=','terminer')
                        ->get();
        // dd($annonces);
        return view('DashboardClient.refuse', compact('annonces'));
    }

    public function gestAnnonce(){
        $annonceClients = DB::table('users')
                        ->join('annonces', 'users.id','=' ,'user_id')
                        ->where('user_id','=',auth()->user()->id)
                        ->get();
        return view('DashboardClient.gerer',compact('annonceClients'));
    }

    public function changerCl(){
        return view('DashboardClient.changer');
    }

    public function updatePassword(Request $request){

        $request->validate([
            'old_password' => 'required',
            'new_password' => ['required','confirmed', 'string', 'min:8'],
        ]);

        if(!Hash::check($request->old_password , auth()->user()->password)){
            return back()->with('error', 'Veuillez mettre le bon mot de passe !');
        }
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return back()->with('success', 'Mot de passe changer avec succ??s !');

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
}
