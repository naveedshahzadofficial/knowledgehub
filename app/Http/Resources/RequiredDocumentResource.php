<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class RequiredDocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'position' => $this->position,
            'rlco_id' => $this->rlco_id,
            'required_document_id' => $this->required_document_id,
            'document_title' => optional($this->requiredDocument)->document_title,
            'document_type' => explode(', ',$this->document_type),
        ];
    }
}
