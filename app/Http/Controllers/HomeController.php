<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function accueil(){
        return view('Home.accueil');
    }

    public function redirection() {
    if(Auth::id()) {
        if(Auth::user()->profil === 'admin'){
            return view('Admin.admin');
        }elseif(Auth::user()->profil === 'ouvrier'){
            return view('DashboardOuvrier.index');
        }elseif(Auth::user()->profil === 'client'){
            return view('DashboardClient.index');
        }elseif(Auth::user()->profil === 'agent'){
            return view('Agence.admin');
            $annonceClients = DB::table('users')
            ->join('annonces', 'users.id','=' ,'user_id')
            ->where('user_id','=',auth()->user()->id)
            ->get();
            return view('DashboardClient.index',compact('annonceClients'));
        }elseif(Auth::user()->profil === 'agent'){
            return view('Home.accueil');
        }else{
            return view('Home.accueil');
        }
    }

}

    public function admin(){
        return view('Admin.admin');
    }
    public function newAnnonce(){
        return view('ads.nouvelleAnnonce');
    }

    public function metier(){
     //Recuperation des metiers
       $metiers = DB::table('metiers')->get();
       return view('DashboardOuvrier.metier', compact('metiers'));
    }

    public function changer(){
        return view('DashboardOuvrier.changer');
    }






}
