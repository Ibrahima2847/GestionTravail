<?php

namespace App\Actions\Fortify;

use App\Models\Agent;
use App\Models\Chef;
use App\Models\ChefAgence;
use App\Models\Client;
use App\Models\Ouvrier;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255','alpha', 'regex:/^[a-zA-Z]+$/'],
            'prenom' => ['required', 'string', 'max:255','alpha', 'regex:/^[a-zA-Z]+$/'],
            'telephone' => ['required','integer','starts_with:77,76,75,70,78,33', Rule::unique(User::class),],
            'email' => ['required','string','email','max:255',Rule::unique(User::class),],
            'password' => $this->passwordRules(),
        ])->validate();

       // dd($input);

        $user = User::create([
            'prenom' => $input['prenom'],
            'name' => $input['name'],
            'email' => $input['email'],
            'telephone' => $input['telephone'],
            'profil' => $input['profil'],
            'password' => Hash::make($input['password']),
        ]);

        if($user->profil === 'ouvrier'){
            $ouvrier = Ouvrier::create([
                'id_ouvrier' => $user->id,
            ]);

        }elseif($user->profil === 'client'){
            $client = Client::create([
                'id_client' => $user->id,
            ]);
        }elseif($user->profil === 'agent'){
            $chefAgence = Agent::create([
                'id_chefAgence' => $user->id,
            ]);
        }elseif($user->profil === 'chefAgent'){
            $chefAgence = Chef::create([
                'chefAgence_id' => $user->id,
            ]);
        }
        return $user;
    }
}

