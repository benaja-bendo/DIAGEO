<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GeolocalisationRessource;
use App\Models\Geolocalisation;
use Illuminate\Http\Request;

class GeolocalisationsController extends Controller
{
    static function store(array $request)
    {
        $geolocalisation = new Geolocalisation();
        $geolocalisation->adresse = $request['adresse'];
        $geolocalisation->latitude = $request['latitude'];
        $geolocalisation->longitude = $request['longitude'];
        $geolocalisation->quartier_id = $request['quartier_id'];
        if ($geolocalisation->save()) {
            return new GeolocalisationRessource($geolocalisation);
        } else {
            return response([
                'statut' => 0
            ], 404);
        }
    }
}
