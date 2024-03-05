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
        Schema::create('cash_sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->bigInteger('branch_id');
            $table->bigInteger('user_id');
            $table->decimal('product_amount');
            $table->decimal('body_price_usd');
            $table->decimal('body_price_uzs');
            $table->decimal('sales_price');
            $table->integer('sales_order');
            $table->boolean('canceled')->default(false);
            $table->date('canceled_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_sales');
    }
};
