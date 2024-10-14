<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ActivityResource extends JsonResource
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
            'activity_name' => $this->activity_name,
            'activity_icon' => $this->activity_icon,
            'activity_icon_url' => !empty($this->activity_icon)?Storage::url($this->activity_icon):null,
            "rlcos" => RlcoResource::collection($this->whenLoaded('rlcos')),
            'rlcos_count' => $this->rlcos_count??null,
            ];
    }
}
