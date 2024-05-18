<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emploi = Emploi::with('salles','annee_universitaires','jours','horaires','charge_horaires')->get();
        return $emploi;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emploi = new Emploi([
            'id_jour' => $request->input('id_jour'),
            'id_heure' => $request->input('id_heure'),
            'id_charge_horaire' => $request->input('id_charge_horaire'),
            'id_salle' => $request->input('id_salle'),
            'id_annee' => $request->input('id_annee'),
            ]);
            $emploi->save();
            return response()->json($emploi,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $emploi = Emploi::find($id);
        return response()->json($emploi);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $emploi = Emploi::find($id);
        $emploi->update($request->all());
        return response()->json($emploi,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $emploi = Emploi::find($id);
        $emploi->delete();
        return response()->json('emploi supprimée !');
    }







    public function showSalle($idsalle)
    {
        $emploi= Emploi::where('id_salle', $idsalle)->with('salles')->get();
        return response()->json($emploi);
}




public function showAnnee($idannee)
{
    $emploi= Emploi::where('id_annee', $idannee)->with('annee_universitaires')->get();
    return response()->json($emploi);
}

public function showjour($idjour)
{
    $emploi= Emploi::where('id_jour', $idjour)->with('jours')->get();
    return response()->json($emploi);
}

public function showheure($idheure)
{
    $emploi= Emploi::where('id_heure', $idheure)->with('horaires')->get();
    return response()->json($emploi);
}


public function showcharge($idcharge)
{
    $emploi= Emploi::where('id_charge_horaire', $idcharge)->with('charge_horaires')->get();
    return response()->json($emploi);
}




}
