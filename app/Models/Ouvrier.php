<?php

namespace App\Models;

use App\AnnonceOuvrier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrier extends Model
{
    use HasFactory;
    protected $fillable = ['id_ouvrier'];

    public function service(){
        return $this->hasOne('App\Models\Ouvrier');
    }

    public function relation(){
        return $this->belongsTo(Relation::class);
    }

    // public function annonces()
    // {
    //     return $this->belongsToMany(Annonce::class, 'ouvrier_id', 'annonce_id')->using(AnnonceOuvrier::class);
    // }

}
