<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

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
        }elseif(Auth::user()->profil === 'chefAgence'){
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
        return view('DashboardOuvrier.metier');
    }

    public function changer(){
        return view('DashboardOuvrier.changer');
    }






}
