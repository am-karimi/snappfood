<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
            [
                'id'=>$this->id,
                'title'=>$this->name,
                'price'=>$this->price,
                'raw_material'=>$this->raw_material,
                'image'=>$this->image ?? null
            ];

    }
}
