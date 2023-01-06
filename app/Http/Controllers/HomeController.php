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
        }
        elseif(Auth::user()->profil === 'client'){
            return view('Client.client');
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
