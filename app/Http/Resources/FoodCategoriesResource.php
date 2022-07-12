<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodCategoriesResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
            [
                'categories'=>
                    [
                        'id'=>$this->id,
                        'title'=>$this->name,
                        'foods'=>FoodResource::collection($this->foods)
                    ]
            ];
    }
}
