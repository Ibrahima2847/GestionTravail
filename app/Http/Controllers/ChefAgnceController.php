<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Agent;
use App\Models\Region;
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
                        ->join('regions','regions.id','=','region_id')
                        ->get();

        foreach($region as $reg){

        $agent = DB::table('agents')
                    ->join('users','users.id','=','id_chefAgence')
                    ->join('agences','agences.id','=','agence_id')
                    ->join('regions','regions.id','=','agences.region_id')
                    ->where('affectation', '=', 'oui')
                    ->where('regions.id','=',$reg->id)
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
}
