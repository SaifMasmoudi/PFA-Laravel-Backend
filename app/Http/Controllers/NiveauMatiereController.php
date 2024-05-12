<?php

namespace App\Http\Controllers;

use App\Models\NiveauMatiere;
use Illuminate\Http\Request;

class NiveauMatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveauMatiere = NiveauMatiere::with('niveaux','matieres')->get();
        return $niveauMatiere;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $niveauMatiere = new NiveauMatiere([
            'id_niveau' => $request->input('id_niveau'),
            'id_matiere' => $request->input('id_matiere'),
        ]);
        $niveauMatiere->save();
        return response()->json($niveauMatiere,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $niveauMatiere = NiveauMatiere::with(['niveaux', 'matieres'])->find($id);
        return response()->json($niveauMatiere);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $niveauMatiere = NiveauMatiere::find($id);
        if (!$niveauMatiere) {
            return response()->json(['message' => 'niveauMatiere non trouvée.'], 404);
        }
        $niveauMatiere->update($request->all());

        return response()->json($niveauMatiere,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $niveauMatiere =NiveauMatiere::find($id);
        if (!$niveauMatiere) {
            return response()->json(['message' => 'niveauMatiere non trouvée.'], 404);
        }
        $niveauMatiere->delete();
        return response() -> json('niveauMatiere supprimee');
    }



    public function showniveau($idniveau){
        $reser= NiveauMatiere::where('id_niveau', $idniveau)->with('niveaux')->get();
        return response()->json($reser);
        }


    public function showmatiere($idmatiere){
        $rese= NiveauMatiere::where('id_matiere', $idmatiere)->with('matieres')->get();
        return response()->json($rese);
        }
}
