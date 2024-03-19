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
            $table->decimal('amount', 18, 2);
            $table->decimal('body_price_usd', 18, 2);
            $table->decimal('body_price_uzs', 18, 2);
            $table->decimal('sales_price', 18, 2);
            $table->integer('sales_order');
            $table->integer('check_status')->default(0);
            $table->boolean('canceled')->default(false);
            $table->date('canceled_date')->nullable();
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
