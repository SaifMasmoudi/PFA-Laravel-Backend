<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveau = Niveau::all();
        return $niveau;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $niveau = new Niveau([
            'nom_niveau' => $request->input('nom_niveau'),
        ]);
        $niveau->save();
        return response()->json($niveau,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $niveau = Niveau::find($id);
        return response()->json($niveau);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $niveau = Niveau::find($id);
        $niveau->update($request->all());

        return response()->json($niveau,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $niveau =Niveau::find($id);
        $niveau->delete();
        return response() -> json('niveau  supprimee');
    }
}
