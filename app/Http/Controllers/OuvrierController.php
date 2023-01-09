<?php

namespace App\Http\Controllers;

use App\Http\Requests\OuvrierStore;
use App\Models\Ouvrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OuvrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //Recuperation des ouvriers
       $ouvriers = DB::table('ouvriers')
                        ->join('users', 'users.id','=' ,'id_Ouvrier')->paginate(10);
        return view('Home.ouvrier', compact('ouvriers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OuvrierStore $request)
    {
<<<<<<< HEAD

            $validated = $request->validated();
            dd($validated);

            // $ad = new Ouvrier();
            // $ad->id_Ouvrier = auth()->user()->id;
            // $ad->save();
            // return redirect()->route('accueil');



=======
        //
>>>>>>> 9372296a9f7400240fc9b5df4f20e81f7a795316
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
