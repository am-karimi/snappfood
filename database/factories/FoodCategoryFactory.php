<?php

namespace Database\Factories;

use App\Models\RestaurantCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\This;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodCategory>
 */
class FoodCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name'=>$this->faker->text(10),
            'slug'=>$this->faker->text(5),
            'restaurant_category_id'=>RestaurantCategory::select('id')->get()->random()->id,
        ];
    }
}
