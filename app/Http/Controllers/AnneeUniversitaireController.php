<?php

namespace App\Http\Controllers;

use App\Models\AnneeUniversitaire;
use Illuminate\Http\Request;

class AnneeUniversitaireController extends Controller
{
    public function index()
    {
        $annee = AnneeUniversitaire::with('charge_horaires')->get();
        return $annee;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $annee = new AnneeUniversitaire([
            'nom_annee' => $request->input('nom_annee'),
            'id_charge_horaire' => $request->input('id_charge_horaire'),
            ]);
            $annee->save();
            return response()->json($annee,201);
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


    public function showAnneeUniversitaire($idcat)
    {
        $annee= AnneeUniversitaire::where('id_charge_horaire', $idcat)->with('charge_horaires')->get();
        return response()->json($annee);
}
}
