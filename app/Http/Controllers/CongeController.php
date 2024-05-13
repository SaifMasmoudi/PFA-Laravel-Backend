<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    public function index()
    {
        $conge = Conge::with('enseignants')->get();
        return $conge;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $conge = new Conge([
            'type_conge' => $request->input('type_conge'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'id_enseignant' => $request->input('id_enseignant'),
            ]);
            $conge->save();
            return response()->json($conge,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $conge = Conge::find($id);
        return response()->json($conge);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $conge = Conge::find($id);
        $conge->update($request->all());
        return response()->json($conge,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $conge = Conge::find($id);
        $conge->delete();
        return response()->json('conge supprimée !');
    }

    public function showEnseignantByCAT($idcat)
    {
        $conge= Conge::where('id_enseignant', $idcat)->with('enseignants')->get();
        return response()->json($conge);
}
}