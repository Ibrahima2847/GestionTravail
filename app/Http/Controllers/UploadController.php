<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Relation;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload($id,Request $request)
    {
    $rel = Relation::find($id);

    $contrat = Contrat::join('relations','contrats.id','=','contrat_id')
                    ->where('contrats.id','=',$rel->contrat_id)
                    ->select('contrats.*')
                    ->first();


        // Vérifie si le fichier est présent et valide
        // if ($request->hasFile('pdf')) {

            // Obtenez le nom d'origine du fichier
            $filename = $request->file('pdf')->getClientOriginalName();
            $contrat->contratOuvrier = $filename;
            $contrat->save();

            // Retourne une réponse de succès
            return back()->with('success', 'Votre contrat a été bien enregistré');
        // }

        // else{
        //     return back()->with('error', 'Veuillez joindre un contrat');
        // }

    }

    public function uploadClient($id,Request $request)
    {
    $rel = Relation::find($id);

    $contrat = Contrat::join('relations','contrats.id','=','contrat_id')
                    ->where('contrats.id','=',$rel->contrat_id)
                    ->select('contrats.*')
                    ->first();

        // dd($request->all());

        // Vérifie si le fichier est présent et valide
        // if ($request->hasFile('pdf')) {

            // Obtenez le nom d'origine du fichier
            $filename = $request->file('pdf')->getClientOriginalName();
            $contrat->contratClient = $filename;
            $contrat->save();

            // Retourne une réponse de succès
            return back()->with('success', 'Votre contrat a été bien enregistré');
        // }

        // else{
        //     return back()->with('error', 'Veuillez joindre un contrat');
        // }

    }

}
