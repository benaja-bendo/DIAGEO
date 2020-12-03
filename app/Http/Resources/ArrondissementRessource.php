<?php

namespace App\Http\Resources;

use App\Models\Arrondissement;
use Illuminate\Http\Resources\Json\JsonResource;

class ArrondissementRessource extends JsonResource
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
            'numero' => $this->numero,
            'nom_arrondissement' => $this->nom_arrondissement,
            'quartiers'=>QuartierRessource::collection(Arrondissement::find($this->id)->quartier),
        ];
    }
}
