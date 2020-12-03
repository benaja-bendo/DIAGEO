<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArrondissementRessource;
use App\Models\Arrondissement;
use Illuminate\Http\Request;

class ArrondissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ArrondissementRessource::collection(Arrondissement::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return ArrondissementRessource
     */
    public function store(Request $request)
    {
        $arrondissement = new Arrondissement();
        $arrondissement->numero = $request->numero;
        $arrondissement->nom_arrondissement = $request->nom_arrondissement;
        $arrondissement->ville_id = $request->ville_id;
        if ($arrondissement->save()) {
            return new ArrondissementRessource($arrondissement);
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
     * @return ArrondissementRessource
     */
    public function show($id)
    {
        $arrondissement = Arrondissement::find($id);
        if ($arrondissement) {
            return new ArrondissementRessource($arrondissement);
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
     * @return ArrondissementRessource
     */
    public function update(Request $request, $id)
    {
        $arrondissement = Arrondissement::findOrFail($id);
        $arrondissement->numero = $request->numero;
        $arrondissement->nom_arrondissement = $request->nom_arrondissement;
        $arrondissement->ville_id = $request->ville_id;
        if ($arrondissement->save()){
            return new ArrondissementRessource($arrondissement);
        }
        else{
            return response([
                'statut'=> 0
            ],404);
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
        $arrondissement = Arrondissement::findOrFail($id);
        if ($arrondissement->delete()){
            return response([
                'statut'=> 1
            ],200);
        }
        else{
            return response([
                'statut'=> 0
            ],404);
        }
    }
}
