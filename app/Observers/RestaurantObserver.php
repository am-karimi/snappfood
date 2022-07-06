<?php

namespace App\Observers;

use App\Models\Restaurant;

class RestaurantObserver
{
    /**
     * Handle the Restaurant "created" event.
     *
     * @param \App\Models\Restaurant $restaurant
     * @return void
     */
    public function created(Restaurant $restaurant)
    {
        //
    }

    /**
     * Handle the Restaurant "updated" event.
     *
     * @param \App\Models\Restaurant $restaurant
     * @return void
     */
    public function updated(Restaurant $restaurant)
    {
        //
    }

    /**
     * Handle the Restaurant "deleted" event.
     *
     * @param \App\Models\Restaurant $restaurant
     * @return void
     */
    public function deleted(Restaurant $restaurant)
    {
        $restaurant = $restaurant->load('address');
        $restaurant->address->delete();
        $restaurant = $restaurant->load('foods');



        foreach ($restaurant->foods as $food) {
            $food->delete();
        }
    }

    /**
     * Handle the Restaurant "restored" event.
     *
     * @param \App\Models\Restaurant $restaurant
     * @return void
     */
    public function restored(Restaurant $restaurant)
    {
        //
    }

    /**
     * Handle the Restaurant "force deleted" event.
     *
     * @param \App\Models\Restaurant $restaurant
     * @return void
     */
    public function forceDeleted(Restaurant $restaurant)
    {
        //
    }
}
