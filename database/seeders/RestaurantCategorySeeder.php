<?php

namespace Database\Seeders;

use App\Models\RestaurantCategory;
use Illuminate\Database\Seeder;

class RestaurantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RestaurantCategory::create([
            'name'=>'fast-food',
            'slug'=>'فست فود',
        ]);
        RestaurantCategory::create([
            'name'=>'irani',
            'slug'=>'ایرانی',
        ]);
        RestaurantCategory::create([
            'name'=>'kebab',
            'slug'=>'کباب',
        ]);
        RestaurantCategory::create([
            'name'=>'salad',
            'slug'=>'سالاد',
        ]);
        RestaurantCategory::create([
            'name'=>'sea-food',
            'slug'=>'دریایی',
        ]);
        RestaurantCategory::create([
            'name'=>'international',
            'slug'=>'بین الملل',
        ]);
    }
}
