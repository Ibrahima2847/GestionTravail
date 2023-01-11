<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrier extends Model
{

    protected $fillable = ['id_Ouvrier'];
    use HasFactory;

    public function metier(){
        return $this->hasOne('App\Models\Metier');
    }
}
