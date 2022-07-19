<?php

namespace App\Http\Resources;

use App\Models\Food;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
            [
                'name' => $this->food->name,
                'count' => $this->quantity,
                'price' => $this->price,
            ];
    }
}
