<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOn()
    {
       //Recuperation des clients
       $clients = DB::table('clients')
                        ->join('users', 'users.id','=' ,'id_client')->paginate(10);
        return view('clients.index', compact('clients'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOn()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOn(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required','integer', 'unique:users'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','string','min:8']
        ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'profil' => $request->profil,
            'password' => Hash::make($request->password),
        ]);
        $client = Client::create([
            'id_client' => $user->id,]);

        return redirect()->route('gest_client')
                        ->with('success','Client created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientOu  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        // Les routes pour les annonces !
    }
}
