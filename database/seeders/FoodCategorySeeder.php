<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use App\Models\RestaurantCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodCategory::create([
            'name'=>'pizza',
            'slug'=>'پیتزا',
            'restaurant_category_id'=>numberBetween(0,6),
        ]);

        FoodCategory::create([
            'name'=>'sandwich',
            'slug'=>'ساندویچ',
            'restaurant_category_id'=>2,
        ]);

//        FoodCategory::create([
//            'name'=>'berger',
//            'slug'=>'برگر',
//            'restaurant_category_id'=>rand(0,6),
//        ]);
//
//        FoodCategory::create([
//            'name'=>'pasta',
//            'slug'=>'پاستا',
//            'restaurant_category_id'=>rand(0,6),
//        ]);
//
//        FoodCategory::create([
//            'name'=>'sokhari',
//            'slug'=>'سوخاری',
//            'restaurant_category_id'=>rand(0,6),
//        ]);
//
//        FoodCategory::create([
//            'name'=>'stack',
//            'slug'=>'استیک',
//            'restaurant_category_id'=>rand(0,6),
//        ]);

    }
}
