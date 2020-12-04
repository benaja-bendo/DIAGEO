<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Translation\t;

class Point_ventesRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'telephone1' => $this->telephone1,
            'telephone2' => $this->telephone2,
            'email' => $this->email,
            'geolocalisation' => [
                'adresse' => $this->adresse,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'quartier_id' => $this->quartier_id,
            ],
            'libelle'=>$this->libelle,
        ];
    }
}
