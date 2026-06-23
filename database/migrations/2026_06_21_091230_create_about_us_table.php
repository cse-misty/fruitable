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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();

                $table->string('sub_title')->default('Who We Are');
                $table->string('title')->nullable();
                $table->text('description_top')->nullable();
                $table->text('description_bottom')->nullable();


                $table->string('image')->nullable();
                $table->string('experience_year')->default('10+');
                $table->string('experience_text')->default('Years of Freshness');


                $table->text('mission_title')->nullable();
                $table->longText('mission_description')->nullable();
                $table->text('vision_title')->nullable();
                $table->longText('vission_description')->nullable();
                $table->text('core_value_title')->nullable();
                $table->longText('core_value_description')->nullable();

               $table->boolean('status')->default(1);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
