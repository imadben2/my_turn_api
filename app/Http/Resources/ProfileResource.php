<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_name' => $this->user_name,
            'date_naissance' => $this->date_naissance,
            'email' => $this->email,
            'wilaya' => $this->wilaya,
            'commune' => $this->commune,
            'groupe_sanguin' => $this->groupe_sanguin,
            'poids' => $this->poids,
            'taille' => $this->taille,
            'maladie_chronique' => $this->maladie_chronique,
            'affiche_groupe_sanguin' => $this->affiche_groupe_sanguin,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
