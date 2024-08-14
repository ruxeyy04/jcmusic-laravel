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
        Schema::create('carts', function (Blueprint $table) {
            $table->id('cartid');
            $table->unsignedBigInteger('ins_no');
            $table->unsignedBigInteger('userID');
            $table->integer('quantity');
            $table->date('dateadded')->default(now());
            $table->timestamps();

            $table->foreign('ins_no')->references('ins_idno')->on('items');
            $table->foreign('userID')->references('userID')->on('users');

            $table->index('ins_no');
            $table->index('userID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
