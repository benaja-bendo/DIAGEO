<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuartierRessource;
use App\Models\Quartier;
use Illuminate\Http\Request;

class QuartierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return QuartierRessource::collection(Quartier::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return QuartierRessource
     */
    public function store(Request $request)
    {
        $quartier = new Quartier();
        $quartier->nom = $request->nom;
        $quartier->arrondissement_id = $request->arrondissement_id;
        if ($quartier->save()) {
            return new QuartierRessource($quartier);
        } else {
            return response([
                'statut' => 0
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return QuartierRessource
     */
    public function show($id)
    {
        $quartier = QuartierRessource::find($id);
        if ($quartier) {
            return new QuartierRessource($quartier);
        } else {
            return response([
                'statut' => 0
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return QuartierRessource
     */
    public function update(Request $request, $id)
    {
        $quartier = Quartier::findOrFail($id);
        $quartier->nom = $request->nom;
        $quartier->arrondissement_id = $request->arrondissement_id;
        if ($quartier->save()) {
            return new QuartierRessource($quartier);
        } else {
            return response([
                'statut' => 0
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quartier = Quartier::findOrFail($id);
        if ($quartier->delete()) {
            return response([
                'statut' => 1
            ], 200);
        } else {
            return response([
                'statut' => 0
            ], 404);
        }
    }
}
