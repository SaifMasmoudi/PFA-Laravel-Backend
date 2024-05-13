<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseignant = Enseignant::all();
        return $enseignant;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $enseignant = new Enseignant([
            'nom_enseignant' => $request->input('nom_enseignant'),
            'prenom_enseignant' => $request->input('prenom_enseignant'),
            'num_tel' => $request->input('num_tel'),
            'email' => $request->input('email'),
        ]);
        $enseignant->save();
        return response()->json($enseignant,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enseignant = Enseignant::find($id);
        return response()->json($enseignant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $enseignant = Enseignant::find($id);
        $enseignant->update($request->all());

        return response()->json($enseignant,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $enseignant =Enseignant::find($id);
        $enseignant->delete();
        return response() -> json('enseignant  supprimee');
    }
}
