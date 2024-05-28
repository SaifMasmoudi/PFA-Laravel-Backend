<?php

namespace App\Http\Controllers;

use App\Models\AnneeUniversitaire;
use Illuminate\Http\Request;

class AnneeUniversitaireController extends Controller
{
    public function index()
    {
        $annee = AnneeUniversitaire::all();
        return $annee;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $annee = new AnneeUniversitaire();
        $annee->nom_annee = $request->input('nom_annee');
        $annee->semester = $request->input('semester');
        
        $annee->save();
        return response()->json($annee, 201);
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $annee = AnneeUniversitaire::find($id);
        return response()->json($annee);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $annee = AnneeUniversitaire::find($id);
        $annee->update($request->all());
        return response()->json($annee,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $annee = AnneeUniversitaire::find($id);
        $annee->delete();
        return response()->json('annee supprimée !');
    }


    
}
