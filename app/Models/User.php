<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prenom',
        'name',
        'email',
        'password',
        'profil',
        'telephone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profils(){
        return $this->belongsToMany(profil::class);
    }

    public function ads(){
        return $this->hasMany('App\Models\Annonce');
    }

    public function ouvrier(){
        return $this->hasMany('App\Models\Ouvrier');
    }

    public function client(){
        return $this->hasMany('App\Models\Client');
    }

    public function chefAgence(){
        return $this->hasMany('App\Models\ChefAgence');
    }

}
