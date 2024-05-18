<?php

namespace App\Http\Controllers;

use App\Models\Horaire;
use Illuminate\Http\Request;

class HoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heure = Horaire::all();
        return $heure;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $heure = new Horaire([
            'heure' => $request->input('heure'),
           
        ]);
        $heure->save();
        return response()->json($heure,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $heure = Horaire::find($id);
        return response()->json($heure);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $heure = Horaire::find($id);
        $heure->update($request->all());

        return response()->json($heure,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $heure =Horaire::find($id);
        $heure->delete();
        return response() -> json('heure  supprimee');
    }
}
