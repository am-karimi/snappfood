<?php

namespace App\Http\Resources;

use http\Client\Response;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleCartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        dd($this);
        return
            [
                'restaurant' =>
                    [
                        'title' => $this->restaurant->name,
                        'image' => null,
                    ],
                'cart' =>
                    [
                        'status'=>$this->status,
                        'total_price'=>0,
                        'cartItem'=>[SingleFoodCartResource::collection($this->cartItems)]
                    ]
            ];
    }
}
