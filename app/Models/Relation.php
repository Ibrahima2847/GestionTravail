<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;
    public function ouvrier(){
        return $this->hasMany(Ouvrier::class);
    }

    public function annonce(){
        return $this->hasOne(Annonce::class);
    }
}
