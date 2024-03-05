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
        Schema::create('return_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cash_sale_id');
            $table->bigInteger('branch_id');
            $table->bigInteger('user_id');
            $table->string('comment');
            $table->date('date');
            $table->integer('check_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_products');
    }
};
