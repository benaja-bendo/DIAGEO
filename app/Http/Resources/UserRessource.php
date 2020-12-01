<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserRessource extends JsonResource
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
            'name' => $this->name,
            'prenom' => $this->prenom,
            'telephone1' => $this->telephone1,
            'telephone2' => $this->telephone2,
            'email' => $this->email,
            'role' => $this->role,
            'profile_photo_url' => $this->profile_photo_url,

        ];
    }
}
