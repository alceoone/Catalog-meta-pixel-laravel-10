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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_product')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('sku')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('price_discount', 10, 2)->nullable();
            $table->enum('status_discount', ['on', 'off'])->nullable();
            $table->enum('condition', ['new', 'second'])->nullable();
            $table->json('tags')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status', ['draf','ready','publish', 'archives'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
