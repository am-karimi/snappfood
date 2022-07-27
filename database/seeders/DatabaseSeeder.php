<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Discount;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Image;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\User;
use Database\Factories\RestaurantCategoryFactory;
use Database\Factories\RestaurantFactory;
use Database\Factories\RestaurantRestaurantCategoryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
            $this->call([
                BasicRole::class,
                UserSeeder::class,
                RestaurantCategorySeeder::class,
            ]);
        FoodCategory::factory(20)->create();

        # seed Pivot Table Restaurant Restaurant Category
        $restaurant=Restaurant::factory(20)->create();
        $restaurant->each(function ($query){
            $query->restaurantCategories()->attach(
             RestaurantCategory::all()->random(2)->first()->id,
            );
        });

        Discount::factory(50)->create();

        # seed Pivot Table Food Restaurant
        $food=Food::factory(40)->create();
        $food->each(function ($query){
            $query->restaurants()->attach(
                Restaurant::all()->random(2)->first()->id,
            );
        });
//        Cart::factory(5)->create();
//        CartItem::factory(10)->create();


//        $users = User::factory(5)->has(
//            Ghaza::factory(5)->has(
//                Category::factory()->suspended()
//            )
//        )->hasPhones(1)->hasAddresses(1)->has(
//            Restaurant::factory(rand(2, 4))
//                ->has(
//                    Category::factory()
//                )->has(
//                    Image::factory(rand(3, 7))
//                )->has(
//                    Address::factory()
//                )->has(
//                    Phone::factory()
//                )
//                ->has(
//                    Menu::factory(5)
//                        ->has(
//                            Ghaza::factory()
//                        )->has(
//                            Coupon::factory()
//                        )
//                )
//        )->create();
    }
}
