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
        Schema::create('orderdetail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderhead_id');
            $table->foreign('orderhead_id')->references('id')->on('orderhead')->onDelete('cascade');
            $table->foreignId('products_id');
            $table->foreign('products_id')->references('id')->on('products');
            $table->integer('qty');
            $table->decimal('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetail');
    }
};
