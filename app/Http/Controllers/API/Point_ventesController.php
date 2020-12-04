<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Point_ventesRessource;
use App\Models\Point_vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Point_ventesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $point_vente = Point_vente::leftJoin('geolocalisations','point_ventes.geolocalisation_id','=','geolocalisations.id')
            ->leftJoin('type_point_ventes','point_ventes.type_point_vente_id','=','type_point_ventes.id')
            ->get();
        return Point_ventesRessource::collection($point_vente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Point_ventesRessource
     */
    public function store(Request $request)
    {
        $point_vente = new Point_vente();
        $point_vente->nom = $request->nom;
        $point_vente->telephone1 = $request->telephone1;
        $point_vente->telephone2 = $request->telephone2;
        $point_vente->email = $request->email;
        $geolocalisation = GeolocalisationsController::store($request->geolocalisation);
        $point_vente->geolocalisation_id = $geolocalisation->resource->id;
        $point_vente->type_point_vente_id =  $request->type_point_vente_id;
        if ($point_vente->save()){
//            return new Point_ventesRessource($point_vente);
            return response([
                'statut' => 1
            ], 200);
        }else {
            return response([
                'statut' => 0
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Point_ventesRessource
     */
    public function show($id)
    {
        $point_vente = Point_vente::find($id);
//        $point_vente = Point_vente::leftJoin('geolocalisations','point_ventes.geolocalisation_id','=','geolocalisations.id')
//            ->leftJoin('type_point_ventes','point_ventes.type_point_vente_id','=','type_point_ventes.id')
//            ->where('point_ventes.id',$id)
//            ->get();
        if ($point_vente){
            return new Point_ventesRessource($point_vente);
        }
        else {
            return response([
                'statut' => 0
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $point_vente = Point_vente::findOrFail($id);
        if ($point_vente->delete()) {
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
