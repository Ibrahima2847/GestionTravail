<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Agent;
use App\Models\Region;
use App\Models\Relation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChefAgnceController extends Controller
{
    public function createAgent(Request $input){

        $user = User::create([
            'prenom' => $input['prenom'],
            'name' => $input['name'],
            'email' => $input['email'],
            'telephone' => $input['telephone'],
            'profil' => $input['profil'],
            'password' => Hash::make($input['password']),
        ]);

        $chefAgence = new Agent();
        $chefAgence->id_chefAgence = $user->id;
        $chefAgence->save();

        return back()->with('success', "L'agent a été bien enregistré !");

    }

    public function gestAgent(){
        return view('DashboardChefAgence.createAgent');
    }

    public function toutAgent(){

        $region = DB::table('agences')
                        ->join('chefs','chefAgence_id','=','chef_id')
                        ->join('regions','regions.id','=','region_id')
                        ->where('chef_id','=',auth()->user()->id)
                        ->get();

        foreach($region as $reg){

        $agent = DB::table('agents')
                    ->join('users','users.id','=','id_chefAgence')
                    ->join('agences','agences.id','=','agence_id')
                    ->join('regions','regions.id','=','agences.region_id')
                    ->where('affectation', '=', 'oui')
                    ->where('agences.id','=',$reg->id)
                    ->get();
        }

        // dd($agent);
        return view('DashboardChefAgence.gestAgent',compact('agent'));
    }

    public function affecterAgent($id)
    {
        $agent = Agent::find($id);
        $agence = Agence::where('chef_id','=',auth()->user()->id)->first();

        // dd($agence);

        $agent->agence_id = $agence->id;
        $agent->affectation = 'oui';
        $agent->save();

        return back()->with('success', "L'agent a été recruté avec succes !");
    }

    public function getAgent()
    {
        $chef = DB::table('users')
            ->join('agents', 'users.id', '=', 'id_chefAgence')
            ->where('affectation', '=', 'non')
            ->get();
        return view('DashboardChefAgence.affectationAgent', compact('chef'));
    }

    public function relationTerminer(){
        $chef = DB::table('agences')
                        ->join('chefs','chefs.chefAgence_id','=','chef_id')
                        ->join('users','users.id','=','chefAgence_id')
                        ->where('chefAgence_id','=',auth()->user()->id)
                        ->get();

        foreach($chef as $reg){
            $fin = DB::table('annonces')
                ->join('users','users.id','=','user_id')
                ->join('relations','annonces.id','=','relations.annonce_id')
                ->where('relations.etat','=','terminer')
                ->where('region','=',$reg->localite)
                ->get();
        }

        return view('DashboardChefAgence.relationTerminer',compact('fin'));
    }

    public function voirRelTerminer($id){
        $rel = Relation::find($id);

        $client =DB::table('annonces')
                        ->join('users','users.id','=','user_id')
                        ->join('relations','annonces.id','=','relations.annonce_id')
                        ->join('services','relations.id','=','services.relation_id')
                        ->join('paiements','paiements.id','=','paiement_id')
                        ->join('avis','avis.id','=','avis_id')
                        ->where('relation_id','=',$rel->id)
                        ->get();
        // dd($client);


        return view('DashboardChefAgence.voirRelTerminer',compact('client'));
    }
}
