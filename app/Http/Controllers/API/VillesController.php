<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\VilleRessource;
use App\Models\Ville;
use Illuminate\Http\Request;

class VillesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return VilleRessource::collection(Ville::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return VilleRessource
     */
    public function store(Request $request)
    {
        $ville = new Ville();
        $ville->nom = $request->nom;
        $ville->pays_id = $request->pays_id;
        if ($ville->save()){
            return new VilleRessource($ville);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return VilleRessource
     */
    public function show($id)
    {
        $ville = Ville::find($id);
        if ($ville){
            return new VilleRessource($ville);
        }
        else{
            return response([
                'statut'=> 0
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return VilleRessource
     */
    public function update(Request $request, $id)
    {
        $ville = Ville::findOrFail($id);
        $ville->nom = $request->nom;
        if ($ville->save()){
            return new VilleRessource($ville);
        }else{
            return response([
                'statut'=> 0
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ville = Ville::findOrFail($id);
        if ($ville->delete()){
            return response([
                'statut'=> 1
            ],200);
        }else{
            return response([
                'statut'=> 0
            ],404);
        }
    }
}
