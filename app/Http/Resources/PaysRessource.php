<?php

namespace App\Http\Resources;

use App\Models\Pays;
use Illuminate\Http\Resources\Json\JsonResource;

class PaysRessource extends JsonResource
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
            'villes' => VilleRessource::collection(Pays::find($this->id)->ville),
        ];
    }
}
