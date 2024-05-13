<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examen = Examen::with('niveau_matieres')->get();
        return $examen;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $examen = new Examen([
            'nom_examen' => $request->input('nom_examen'),
            'date_examen' => $request->input('date_examen'),
            'heure_debut' => $request->input('heure_debut'),
            'heure_fin' => $request->input('heure_fin'),
            'id_niveau_matiere' => $request->input('id_niveau_matiere'),
            ]);
            $examen->save();
            return response()->json($examen,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $examen = Examen::find($id);
        return response()->json($examen);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $examen = Examen::find($id);
        $examen->update($request->all());
        return response()->json($examen,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $examen = Examen::find($id);
        $examen->delete();
        return response()->json('examen supprimée !');
    }

    public function showExamenByCAT($idcat)
    {
        $examen= Examen::where('id_niveau_matiere', $idcat)->with('niveau_matieres')->get();
        return response()->json($examen);
}
}