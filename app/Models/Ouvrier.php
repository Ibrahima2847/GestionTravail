<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrier extends Model
{
    public function user(){
        return $this->belongsToMany('App\Models\User ');
    }
    use HasFactory;
}
