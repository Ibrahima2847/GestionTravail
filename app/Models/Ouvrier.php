<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrier extends Model
{

    public function user(){
        if(Auth::user()->profil === 'ouvrier'){
        return $this->belongsToMany('App\Models\User ');
        }
    }
    use HasFactory;
}
