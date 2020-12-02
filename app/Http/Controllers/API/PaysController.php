<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaysRessource;
use App\Models\Pays;
use Illuminate\Http\Request;

class PaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PaysRessource::collection(Pays::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PaysRessource
     */
    public function store(Request $request)
    {
        $pays = new Pays();
        $pays->nom =$request->nom;
        if ($pays->save()){
            return new PaysRessource($pays);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return PaysRessource
     */
    public function show($id)
    {
        $pays = Pays::find($id);
        if($pays){
            return new PaysRessource($pays);
        }
        else{
            return response([
                'statut'=>'aucunne ressource'
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return PaysRessource
     */
    public function update(Request $request, $id)
    {
        $pays = Pays::findOrFail($id);
        $pays->nom = $request->nom;
        if ($pays->save()){
            return new PaysRessource($pays);
        }else{
            return response([
                'message'=> 'echec de mise à jour'
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
        $pays = Pays::findOrFail($id);
        if ($pays->delete()){
            return response([
                'message'=> 'suppression avec succes'
            ],200);
        }else{
            return response([
                'message'=> 'echec de suppression'
            ],404);
        }
    }
}
