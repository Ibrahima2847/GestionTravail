<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Requests\AdStore;
use App\Models\Annonce;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;

class AdController extends Controller
{

    use PasswordValidationRules;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recuperation des annonces et les affichées par ordre de création
        $ads = DB::table('annonces')->orderBy('created_at', 'DESC')->paginate(5);
        $name = DB::table('users');
        return view('Home.offreDemploi', compact('ads','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.nouvelleAnnonce');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdStore $request)
    {
        $validated = $request->validated();

        //  if(Auth::check()){

        //     $request->validate([
        //         'name' => 'required',
        //         'email' => 'required|email|unique:users',
        //         'password' => 'required|confirmed',
        //         'password_confirmation' => 'required',
        //     ]);

        //     $user = User::created([
        //         'name' => $request['name'],
        //         'email' => $request['email'],
        //         'password' => Hash::make($request['password']),
        //     ]);

        //     //$this->guard->login($user);
        // }

        $ad = new Annonce();

        $ad->titre = $validated['titre'];
        $ad->region = $validated['region'];
        $ad->departement = $validated['departement'];
        $ad->image = $validated['image'];
        $ad->user_id = auth()->user()->id;
        $ad->message = $validated['message'];

        $ad->save();

        return redirect()->route('accueil')->with('success', 'Votre annonce a été bien postéé !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Annonce $ad)
    {
        //
    }
}
