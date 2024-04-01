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
        Schema::create('admin_pay_lists', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('pay_sum', 18, 2);
            $table->string('pay_type');
            $table->boolean('in_out_status');
            $table->integer('check_status');
            $table->string('comment');
            $table->integer('user_id');
            $table->integer('branch_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_pay_lists');
    }
};
