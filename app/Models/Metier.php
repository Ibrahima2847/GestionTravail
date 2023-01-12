<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    use HasFactory;

    public function ouvrier(){
        return $this->belongsTo(Ouvrier::class);
    }
}
