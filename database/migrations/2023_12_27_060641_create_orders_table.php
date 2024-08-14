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
            $table->string('orderid', 20)->primary();
            $table->date('date')->default(now());
            $table->string('status', 20);
            $table->unsignedBigInteger('userID');

            $table->foreign('userID')->references('userID')->on('users');

            $table->index('userID');
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
