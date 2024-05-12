<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupe = Groupe::with('niveaux')->get();
        return $groupe;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $groupe = new Groupe([
            'nom_groupe' => $request->input('nom_groupe'),
            'id_niveau' => $request->input('id_niveau'),
            ]);
            $groupe->save();
            return response()->json($groupe,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $groupe = Groupe::find($id);
        return response()->json($groupe);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $groupe = Groupe::find($id);
        $groupe->update($request->all());
        return response()->json($groupe,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $groupe = Groupe::find($id);
        $groupe->delete();
        return response()->json('groupe supprimée !');
    }

    public function showGroupeByCAT($idcat)
    {
        $groupe= Groupe::where('id_niveau', $idcat)->with('niveaux')->get();
        return response()->json($groupe);
}

}
