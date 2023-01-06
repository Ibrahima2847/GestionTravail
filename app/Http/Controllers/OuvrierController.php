<?php

namespace App\Http\Controllers;

use App\Models\Ouvrier;
use Illuminate\Http\Request;

class OuvrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    //dd($request->all());
        //$ou=Ouvrier::find(1);
        //$ou->delete();
       // $ouv=Ouvrier::all();
        $ouvriers = Ouvrier::latest()->paginate(5);
       
        return view('ouvriers.index',compact('ouvriers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('ouvriers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
        ]);

        //dd($request->all());

        $input = $request->all();
        Ouvrier::create($input);

        return redirect()->route('ouvriers.index')
                        ->with('success','Ouvrier created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ouvrier  $ouvrier
     * @return \Illuminate\Http\Response
     */
    public function show(Ouvrier $ouvrier)
    { 
       
        return view('ouvriers.show',compact('ouvrier'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ouvrier  $ouvrier
     * @return \Illuminate\Http\Response
     */
    public function edit(Ouvrier $ouvrier)
    {
        return view('ouvriers.edit',compact('ouvrier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ouvrier  $ouvrier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ouvrier $ouvrier)
    {
    
            $request->validate([
                'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'email' => 'required'
            ]);
    
            $input = $request->all();
    
        
            $ouvrier->update($input);
    
            return redirect()->route('ouvriers.index')
                            ->with('success','Ouvrier updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ouvrier  $ouvrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ouvrier $ouvrier)
    {
        $ouvrier->delete();

        return redirect()->route('ouvriers.index')
                        ->with('success','Ouvrier deleted successfully');
    }
}
