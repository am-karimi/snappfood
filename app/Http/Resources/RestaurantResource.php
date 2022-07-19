<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
            [
                'id'=> $this->id,
                'restaurant'=>
                    [
                        'title'=>$this->restaurant->name,
                        'Image'=>'Null Image'
                    ],
                'foods'=> FoodCardResource::collection($this->cartItems),
                'created_at'=>'',
                'updated_at'=>''
            ];
    }
}
