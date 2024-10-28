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
            $table->bigIncrements('orderID')->primary();
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('productID');
            $table->string('mode_of_payment',length:50);
            $table->string('proof_of_payment');
            $table->timestamps();

            // Add foreign key constraint with onDelete cascade if needed
            $table->foreign('userID')
                ->references('userID')
                ->on('users');

            $table->foreign('productID')
                ->references('productID')
                ->on('products');
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