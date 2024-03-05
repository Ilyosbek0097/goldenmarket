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
        Schema::create('add_products', function (Blueprint $table) {
            $table->id();
            $table->date('register_date');
            $table->bigInteger('product_id');
            $table->decimal('amount', 8, 2);
            $table->decimal('body_price_usd');
            $table->decimal('body_price_uzs');
            $table->decimal('sales_price');
            $table->bigInteger('supplier_id');
            $table->integer('invoice_order');
            $table->integer('check_status')->default(0);
            $table->string('add_comment')->nullable();
            $table->bigInteger('user_id');
            $table->bigInteger('branch_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_products');
    }
};
