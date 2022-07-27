<?php

use App\Models\Address;
use App\Models\Cart;
use App\Models\Restaurant;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Cart::class);
            $table->foreignIdFor(Restaurant::class);
            $table->foreignIdFor(Address::class);
            $table->float('total_price');
            $table->boolean('payment')->default(false);
            $table->enum('status',['pending','preparing','shipping','delivered']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
