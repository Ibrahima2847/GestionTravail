<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

<<<<<<<< HEAD:app/Http/Controllers/gestionClientController.php
class gestionClientController extends Controller
========
class ClientsController extends Controller
>>>>>>>> f3b8b6c6154af2a442ef7fc09f5231e617c9159b:app/Http/Controllers/ClientsController.php
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<<< HEAD:app/Http/Controllers/gestionClientController.php
        //
    }

    public function indexClient(){
        return view('DashboardClient.index');
    }

    public function accepte(){
        return view('DashboardClient.accepte');
    }

    public function refuse(){
        return view('DashboardClient.refuse');
    }

    public function gestAnnonce(){
        return view('DashboardClient.gerer');
    }

    public function changer(){
        return view('DashboardClient.changer');
    }

========
    $clients = DB::table('clients')
            ->join('users', 'users.id','=' ,'id_client')->paginate(10);
        return view('clients.index', compact('clients'));
    }
>>>>>>>> f3b8b6c6154af2a442ef7fc09f5231e617c9159b:app/Http/Controllers/ClientsController.php
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
}
