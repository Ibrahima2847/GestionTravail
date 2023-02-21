<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Annonce;
use App\Models\Chef;
use App\Models\ChefAgence;
use App\Models\Region;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\{AdRepository, MessageRepository};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{

    public function accueil()
    {
        return view('Home.accueil');
    }

    public function redirection()
    {
        if (Auth::id()) {
            if (Auth::user()->profil === 'admin') {
                return view('Admin.admin');
            } elseif (Auth::user()->profil === 'ouvrier') {
                return view('DashboardOuvrier.index');
            } elseif (Auth::user()->profil === 'client') {
                $annonceClients = DB::table('users')
                    ->join('annonces', 'users.id', '=', 'user_id')
                    ->where('user_id', '=', auth()->user()->id)
                    ->get();
                return view('DashboardClient.index', compact('annonceClients'));
            } elseif (Auth::user()->profil === 'agent') {
                return view('Agence.admin');
            } elseif (Auth::user()->profil === 'chefAgence') {
                return view('DashboardChefAgence.accueil');
            } else {
                return view('Home.accueil');
            }
        }
    }


    public function admin()
    {
        return view('Admin.admin');
    }
    public function newAnnonce()
    {
        return view('ads.nouvelleAnnonce');
    }

    public function metier()
    {
        //Recuperation des metiers
        $metiers = DB::table('metiers')
                    ->join('ouvriers','ouvriers.id_Ouvrier','=','ouvrier_id')
                    ->where('ouvrier_id','=',auth()->user()->id)
                    ->first();
        return view('DashboardOuvrier.metier')->with('metier', $metiers);
    }

    public function changer()
    {
        return view('DashboardOuvrier.changer');
    }

    public function getRegion()
    {
        $regions = DB::table('regions')->get();
        $departements = DB::table('departements')->get();
        return response()->json(['regions' => $regions, 'departements' => $departements]);
    }

    public function gestChefAgence()
    {
        return view('Admin.gestChefAgence');
    }

    public function gestAgence()
    {
        return view('Admin.gestAgence');
    }

    public function affectation()
    {
        $chef = DB::table('users')
            ->join('chefs', 'users.id', '=', 'chefAgence_id')
            ->where('affectation', '=', 'non')
            ->get();
        return view('Admin.affectation', compact('chef'));
    }

    public function affecter($id, $idAgence)
    {
        $chef = Chef::find($id);
        $agence = Agence::find($idAgence);

            $agence->chef_id = $chef->chefAgence_id;
            $agence->save();

            $chef->affectation = 'oui';
            $chef->save();

            return back()->with('success', "L'agent a été affécté !");
    }

    public function toutAgence($id)
    {
        $chef = Chef::find($id);
        $agence = DB::table('agences')
            ->where('chef_id', '=', NULL)
            ->get();
        return view('Admin.toutAgence', compact('agence'))->with('chefs', $chef);
    }

    public function createChefAgence(Request $input)
    {

        $user = User::create([
            'prenom' => $input['prenom'],
            'name' => $input['name'],
            'email' => $input['email'],
            'telephone' => $input['telephone'],
            'profil' => $input['profil'],
            'password' => Hash::make($input['password']),
        ]);

        $chefAgence = new Chef();
        $chefAgence->chefAgence_id = $user->id;
        $chefAgence->save();

        return back()->with('success', "Le chef d'agence a été bien enregistré !");
    }

    public function createAgence(Request $request)
    {

        $agence = new Agence();

        $agence->nom = $request['nom'];
        $agence->localite = $request['localite'];
        $region = Region::where('nomRegion','=',$agence->localite)->first();
        $agence->region_id = $region->id;

        $agence->save();

        return back()->with('success', "L'agence a été bien créée !");
    }
}
