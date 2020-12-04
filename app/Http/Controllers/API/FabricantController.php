<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FabricantRessource;
use App\Models\Fabricant;
use Illuminate\Http\Request;

class FabricantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return FabricantRessource::collection(Fabricant::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return FabricantRessource
     */
    public function store(Request $request)
    {
        $fabricant = new Fabricant();
        $fabricant->nom = $request->nom;
        $fabricant->logo = $request->logo;
        if ($fabricant->save()) {
            return new FabricantRessource($fabricant);
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
     * @return FabricantRessource
     */
    public function show($id)
    {
        $fabricant = Fabricant::find($id);
        if ($fabricant) {
            return new FabricantRessource($fabricant);
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
     * @return FabricantRessource
     */
    public function update(Request $request, $id)
    {
        $fabricant = Fabricant::findOrFail($id);
        $fabricant->nom = $request->nom;
        $fabricant->logo = $request->logo;
        if ($fabricant->save()) {
            return new FabricantRessource($fabricant);
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
        $fabricant = Fabricant::findOrFail($id);
        if ($fabricant->delete()) {
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
