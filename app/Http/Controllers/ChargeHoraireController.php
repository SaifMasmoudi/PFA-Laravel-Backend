<?php

namespace App\Http\Controllers;

use App\Models\ChargeHoraire;
use Illuminate\Http\Request;

class ChargeHoraireController extends Controller
{
    public function index()
    {
        $chargehoraire = ChargeHoraire::with('niveau_matieres','enseignants')->get();
        return $chargehoraire;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $chargehoraire = new ChargeHoraire([
            'nb_heure' => $request->input('nb_heure'),
            'id_niveau_matiere' => $request->input('id_niveau_matiere'),
            'id_enseignant' => $request->input('id_enseignant'),
        ]);
        $chargehoraire->save();
        return response()->json($chargehoraire,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $chargehoraire = ChargeHoraire::with(['niveau_matieres','enseignants'])->find($id);
        return response()->json($chargehoraire);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $chargehoraire = ChargeHoraire::find($id);
        if (!$chargehoraire) {
            return response()->json(['message' => 'chargehoraire non trouvée.'], 404);
        }
        $chargehoraire->update($request->all());

        return response()->json($chargehoraire,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $chargehoraire =ChargeHoraire::find($id);
        if (!$chargehoraire) {
            return response()->json(['message' => 'chargehoraire non trouvée.'], 404);
        }
        $chargehoraire->delete();
        return response() -> json('chargehoraire supprimee');
    }

    public function showniveaumatiere($idniveaumatiere){
        $reser= ChargeHoraire::where('id_niveau_matiere', $idniveaumatiere)->with('niveau_matieres')->get();
        return response()->json($reser);
        }


    public function showenseignant($idenseignant){
        $rese= ChargeHoraire::where('id_enseignant', $idenseignant)->with('enseignants')->get();
        return response()->json($rese);
        }
}
