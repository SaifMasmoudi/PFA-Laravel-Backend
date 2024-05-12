<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matiere = Matiere::all();
        return $matiere;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $matiere = new Matiere([
            'nom_matiere' => $request->input('nom_matiere'),
            'description' => $request->input('description'),

        ]);
        $matiere->save();
        return response()->json($matiere,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $matiere = Matiere::find($id);
        return response()->json($matiere);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $matiere = Matiere::find($id);
        $matiere->update($request->all());

        return response()->json($matiere,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matiere =Matiere::find($id);
        $matiere->delete();
        return response() -> json('matiere  supprimee');
    }
}
