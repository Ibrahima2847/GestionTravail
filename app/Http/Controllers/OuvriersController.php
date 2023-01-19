<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ouvrier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class OuvriersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOn()
    {
        //Recuperation des ouvriers
       $ouvriers = DB::table('ouvriers')
       ->join('users', 'users.id','=' ,'id_ouvrier')->paginate(10);
       return view('ouvriers.index', compact('ouvriers'));
   }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOn()
    {
        return view('ouvriers.create');
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
        $chefAgence = Ouvrier::create([
            'id_ouvrier' => $user->id,]);

        return redirect()->route('gest_ouvrier')
                        ->with('success','Ouvrier created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ouvrier  $ouvrierOu
     * @return \Illuminate\Http\Response
     */
    public function show(Ouvrier $ouvrier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ouvrier  $ouvrierOu
     * @return \Illuminate\Http\Response
     */
    public function edit(Ouvrier $ouvrier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ouvrier  $ouvrierOu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ouvrier $ouvrier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ouvrier  $ouvrierOu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ouvrier $ouvrier)
    {
        //
    }
}
