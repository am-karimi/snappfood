<?php

namespace Database\Factories;

use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
//        return [
//            'restaurant_id'=>Restaurant::select('id')->get()->random()->id,
//            'user'=>User::select('id')->get()->random()->id,
//        ];
    }
}
