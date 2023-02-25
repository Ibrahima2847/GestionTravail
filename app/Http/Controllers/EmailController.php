<?php

namespace App\Http\Controllers;

use App\Mail\AnnonceMail;
use App\Mail\AnnonceMarkdownMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function bar(){
        Mail::to(Auth::user()->email)->send(new AnnonceMarkdownMail());
        return view('Email.bar');
    }
}
