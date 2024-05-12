<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salle = Salle::all();
        return $salle;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $salle = new Salle([
            'num_salle' => $request->input('num_salle'),
            'capacite' => $request->input('capacite'),
        ]);
        $salle->save();
        return response()->json($salle,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $salle = Salle::find($id);
        return response()->json($salle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $salle = Salle::find($id);
        $salle->update($request->all());

        return response()->json($salle,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $salle =Salle::find($id);
        $salle->delete();
        return response() -> json('Salle  supprimee');
    }
}
