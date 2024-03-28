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
        Schema::create('pay_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_sale_id');
            $table->date('date');
            $table->decimal('pay_sum', 18, 2);
            $table->string('pay_type');
            $table->boolean('in_out_status');
            $table->string('check_status');
            $table->integer('insert_user_id');
            $table->integer('update_user_id')->nullable();
            $table->integer('branch_id');
            $table->integer('output_type_id')->nullable();
            $table->string('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_lists');
    }
};
