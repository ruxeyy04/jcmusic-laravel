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
        Schema::create('order_details', function (Blueprint $table) {
            $table->string('orderid', 20);
            $table->unsignedBigInteger('ins_no');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->decimal('totalamount', 10, 2);

            $table->primary(['orderid', 'ins_no']);
            $table->foreign('ins_no')->references('ins_idno')->on('items');
            $table->foreign('orderid')->references('orderid')->on('orders');

            $table->index('ins_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
