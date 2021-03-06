<?php

namespace App\Http\Resources;

use App\Models\Ville;
use Illuminate\Http\Resources\Json\JsonResource;

class VilleRessource extends JsonResource
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
            'arrondissements'=>ArrondissementRessource::collection(Ville::find($this->id)->arrondissement)
        ];
    }
}
