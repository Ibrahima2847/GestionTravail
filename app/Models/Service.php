<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function annonce(){
        return $this->hasOne('App\Models\Annonce');
    }

    public function ouvrier(){
        return $this->belongsToMany('App\Models\Ouvrier');
    }
}
