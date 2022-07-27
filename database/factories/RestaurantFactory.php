<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
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
            'phone_number'=>$this->faker->phoneNumber,
            'status'=>1,
            'bank_id'=>$this->faker->numberBetween(1111111,99999999),
            'user_id'=>User::select('id')->where('id','>',8)->get()->random()->id,
        ];
    }
}
