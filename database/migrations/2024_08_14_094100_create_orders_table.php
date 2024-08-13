<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp("order_date")->nullable(false);
            $table->date("require_date");
            $table->integer("quantity");
            $table->decimal("total_price",8,2);
            $table->foreignId("user_id")->constrained();
            $table->foreignId("product_id")->constrained();
            $table->foreignId("cart_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
