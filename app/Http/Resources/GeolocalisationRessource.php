<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GeolocalisationRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
//        return [
//          'adresse'=>$this->adresse,
//          'latitude'=>$this->latitude,
//          'longitude'=>$this->longitude,
//          'quartier_id'=>$this->quartier_id,
//        ];
    }
}
