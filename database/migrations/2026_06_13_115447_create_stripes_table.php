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
        Schema::create('stripes', function (Blueprint $table) {
            $table->id();
          $table->unsignedBigInteger('product_id')->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('mode')->nullable();
            $table->string('secret_key')->nullable();
            $table->string('published_key')->nullable();
            $table->string('payment_gateway_title')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stripes');
    }
};
