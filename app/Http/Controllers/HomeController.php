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
            return view('ouvriers.index');
        }elseif(Auth::user()->profil === 'client'){
            return view('Home.accueil');
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


}
