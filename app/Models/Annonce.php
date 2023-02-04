<?php

namespace App\Models;

use App\AnnonceOuvrier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    protected $fillable = ['annonce_id'];


    public function user(){
        return $this->belongsToMany('App\Models\User');
    }

    public function service(){
        return $this->hasOne('App\Models\Annonce');
    }

    public function relation(){
        return $this->belongsTo(Relation::class);
    }
}
