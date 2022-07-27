<?php

use App\Models\Discount;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->foreignIdFor(Discount::class)
                ->after('food_category_id')->nullable();
//            $table->foreign('discount_id')
//                ->references('id')->on('discounts')->onDelete('cascade');
//
//            $table->foreignId('discount_id');
//            $table->foreign('discount_id')
//                ->references('id')
//                ->on('discounts')
//                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->dropColumn('discount_id');
        });
    }
};
