<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
//        return [
//            'food_id'=>Food::select('id')->get()->random()->id,
//
//        ];
    }
}
