<?php

namespace App\Http\Controllers;

use App\Models\NiveauMatiere;
use Illuminate\Http\Request;

class NiveauMatiereController extends Controller
{
    public function index()
    {
        $niveauMatieres = NiveauMatiere::all();
        return response()->json($niveauMatieres);
    }

    public function store(Request $request)
    {
        $niveauMatiere = NiveauMatiere::create($request->all());
        return response()->json($niveauMatiere, 201);
    }

    public function show($id)
    {
        $niveauMatiere = NiveauMatiere::findOrFail($id);
        return response()->json($niveauMatiere);
    }

    public function update(Request $request, $id)
    {
        $niveauMatiere = NiveauMatiere::findOrFail($id);
        $niveauMatiere->update($request->all());
        return response()->json($niveauMatiere, 200);
    }

    public function destroy($id)
    {
        $niveauMatiere = NiveauMatiere::findOrFail($id);
        $niveauMatiere->delete();
        return response()->json(['message' => 'NiveauMatiere supprimé avec succès']);
    }

    public function showByNiveau($idNiveau)
    {
        $niveauMatieres = NiveauMatiere::where('id_niveau', $idNiveau)->get();
        return response()->json($niveauMatieres);
    }

    public function showByMatiere($idMatiere)
    {
        $niveauMatieres = NiveauMatiere::where('id_matiere', $idMatiere)->get();
        return response()->json($niveauMatieres);
    }
}
