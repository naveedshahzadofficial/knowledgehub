<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessCategoryResource extends JsonResource
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
            'category_name' => $this->category_name=='Select All'?'All types of business':$this->category_name,
            'category_short_name' => $this->category_short_name,
            'category_icon' => $this->category_icon,
            'category_is_sector' => $this->category_is_sector
        ];
    }
}
