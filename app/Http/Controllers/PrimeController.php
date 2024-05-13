<?php

namespace App\Http\Controllers;

use App\Models\Prime;
use Illuminate\Http\Request;

class PrimeController extends Controller
{
    public function index()
    {
        $prime = Prime::with('enseignants')->get();
        return $prime;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prime = new Prime([
            'montant_prime' => $request->input('montant_prime'),
            'id_enseignant' => $request->input('id_enseignant'),
            ]);
            $prime->save();
            return response()->json($prime,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prime = Prime::find($id);
        return response()->json($prime);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prime = Prime::find($id);
        $prime->update($request->all());
        return response()->json($prime,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prime = Prime::find($id);
        $prime->delete();
        return response()->json('prime supprimée !');
    }

    public function showEnseignantByCAT($idcat)
    {
        $prime= Prime::where('id_enseignant', $idcat)->with('enseignants')->get();
        return response()->json($prime);
}
}
