<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_restaurants', function (Blueprint $table) {

            //foreign key 1
            $table->foreignId('restaurant_id');
            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants')
                ->cascadeOnDelete();

            //foreign key 2
            $table->foreignId('food_id');
            $table->foreign('food_id')
                ->references('id')
                ->on('food')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_restaurants');
    }
};
