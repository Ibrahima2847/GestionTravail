<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function accueil(){
        return view('Home.accueil');
    }
    public function apropos(){
        return view('Home.apropos');
    }
    public function admin(){
        return view('Admin.admin');
    }

}
