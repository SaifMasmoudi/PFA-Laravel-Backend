<?php

namespace App\Http\Controllers;

use App\Models\Jour;
use Illuminate\Http\Request;

class JourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jour = Jour::all();
        return $jour;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jour = new Jour([
            'nom' => $request->input('nom'),
           
        ]);
        $jour->save();
        return response()->json($jour,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jour = Jour::find($id);
        return response()->json($jour);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $jour = Jour::find($id);
        $jour->update($request->all());

        return response()->json($jour,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jour =Jour::find($id);
        $jour->delete();
        return response() -> json('jour  supprimee');
    }
}
