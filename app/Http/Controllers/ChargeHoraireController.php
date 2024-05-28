<?php

namespace App\Http\Controllers;

use App\Models\ChargeHoraire;
use Illuminate\Http\Request;

class ChargeHoraireController extends Controller
{
    public function index()
    {
        $chargehoraires = ChargeHoraire::with('niveau_matieres.niveau.groupes')->get();

        $result = $chargehoraires->map(function ($chargehoraire) {
            return [
                'chargeHoraire' => $chargehoraire,
                'groupes' => $chargehoraire->niveau_matieres->niveau->groupes->pluck('nom_groupe')->toArray()
            ];
        });

        return response()->json($result);
    }

    public function store(Request $request)
    {
        $chargehoraire = new ChargeHoraire([
            'nb_heure' => $request->input('nb_heure'),
            'id_niveau_matiere' => $request->input('id_niveau_matiere'),
            'id_enseignant' => $request->input('id_enseignant'),
        ]);
        $chargehoraire->save();
        return response()->json($chargehoraire, 201);
    }

    public function show($id)
    {
        $chargehoraire = ChargeHoraire::with(['niveau_matieres.niveau.groupes', 'enseignants'])->find($id);

        if ($chargehoraire) {
            $result = [
                'chargeHoraire' => $chargehoraire,
                'groupes' => $chargehoraire->niveau_matieres->niveau->groupes->pluck('nom_groupe')->toArray()
            ];
            return response()->json($result);
        }

        return response()->json(['message' => 'ChargeHoraire non trouvée.'], 404);
    }

    public function update(Request $request, $id)
    {
        $chargehoraire = ChargeHoraire::find($id);
        if (!$chargehoraire) {
            return response()->json(['message' => 'ChargeHoraire non trouvée.'], 404);
        }
        $chargehoraire->update($request->all());

        return response()->json($chargehoraire, 200);
    }

    public function destroy($id)
    {
        $chargehoraire = ChargeHoraire::find($id);
        if (!$chargehoraire) {
            return response()->json(['message' => 'ChargeHoraire non trouvée.'], 404);
        }
        $chargehoraire->delete();
        return response()->json('ChargeHoraire supprimée');
    }

    public function showniveaumatiere($idniveaumatiere)
    {
        $reser = ChargeHoraire::where('id_niveau_matiere', $idniveaumatiere)->with('niveau_matieres.niveau.groupes')->get();

        $result = $reser->map(function ($chargehoraire) {
            return [
                'chargeHoraire' => $chargehoraire,
                'groupes' => $chargehoraire->niveau_matieres->niveau->groupes->pluck('nom_groupe')->toArray()
            ];
        });

        return response()->json($result);
    }

    public function showenseignant($idenseignant)
    {
        $rese = ChargeHoraire::where('id_enseignant', $idenseignant)->with('enseignants')->get();
        return response()->json($rese);
    }
 
}
