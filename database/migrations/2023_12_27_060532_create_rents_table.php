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
        Schema::create('rents', function (Blueprint $table) {
            $table->id('rentid');
            $table->unsignedBigInteger('ins_no');
            $table->unsignedBigInteger('userID');
            $table->decimal('totalamountrent', 10, 2);
            $table->integer('quantity');
            $table->string('status', 20);
            $table->date('datetoreturn');
            $table->date('returnedDate')->nullable();
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
        Schema::dropIfExists('rents');
    }
};
