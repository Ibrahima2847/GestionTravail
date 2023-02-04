<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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

    public function afficheMatos(){

        // $words = $request->input('words');
        // $metier =DB::table('metiers')
        //             ->join('users', 'users.id' ,'=', 'ouvrier_id')
        //             ->where('profession', 'LIKE', '%'.$words.'%')
        //             ->get();

        $matos = DB::table('devis')->get();
        return response()->json($matos);

        // return view('services.devis',compact('matos'));

    }

    public function avis(){
        return view('services.avis');
    }

    public function materiel(){
        return view('services.materiel');
    }

    public function paiement(){
        return view('services.paiement');
    }

    public function devis(){
        $devis = DB::table('services')->get();
        return view('services.devis',compact('devis'));
    }
}
