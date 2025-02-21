<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Customize the data returned as needed
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desciption??"Null",
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
        ];
    }
}
