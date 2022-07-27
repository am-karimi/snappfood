<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\FoodCategory;
use App\Models\RestaurantCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text(7),
            'price'=>$this->faker->numberBetween(50000 , 200000),
            'raw_material'=>$this->faker->text(30),
            'food_category_id'=>FoodCategory::select('id')->get()->random()->id,
            'discount_id'=>Discount::select('id')->get()->random()->id,
        ];
    }
}
