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
           Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_title')->nullable();

            $table->string('fresh_title')->nullable();
            $table->string('fresh_offer_text')->nullable();
            $table->string('fresh_image')->nullable();
            $table->string('fresh_link')->nullable();
           $table->string('fresh_bg_color')->nullable();
            $table->string('fresh_content_bg_color')->nullable();
            $table->string('fresh_title_color')->nullable();
            $table->string('fresh_offer_color')->nullable();

            /* ===== Testy SECTION ===== */
            $table->string('tasty_title')->nullable();
            $table->string('tasty_offer_text')->nullable();
            $table->string('tasty_image')->nullable();
            $table->string('tasty_link')->nullable();
            $table->string('tasty_bg_color')->nullable();
            $table->string('tasty_content_bg_color')->nullable();
            $table->string('tasty_title_color')->nullable();
            $table->string('tasty_offer_color')->nullable();

            /* ===== EXOTIC SECTION ===== */
            $table->string('exotic_title')->nullable();
            $table->string('exotic_offer_text')->nullable();
            $table->string('exotic_image')->nullable();
            $table->string('exotic_link')->nullable();

            $table->string('exotic_bg_color')->nullable();
            $table->string('exotic_content_bg_color')->nullable();
            $table->string('exotic_title_color')->nullable();
            $table->string('exotic_offer_color')->nullable();

            $table->boolean('status')->nullable(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
