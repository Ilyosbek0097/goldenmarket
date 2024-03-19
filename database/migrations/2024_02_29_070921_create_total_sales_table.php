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
        Schema::create('total_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('sales_order');
            $table->decimal('total_sales');
            $table->decimal('discount');
            $table->decimal('final_sales');
            $table->boolean('canceled')->default(false);
            $table->date('canceled_date');
            $table->bigInteger('client_id')->nullable();
            $table->bigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_sales');
    }
};
