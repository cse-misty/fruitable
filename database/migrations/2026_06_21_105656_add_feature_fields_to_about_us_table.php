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
        Schema::table('about_us', function (Blueprint $table) {
             $table->string('feature_one_icon')->default('fas fa-leaf')->nullable()->after('experience_text');
            $table->string('feature_one_title')->default('100% Organic Certified')->nullable()->after('feature_one_icon');

            $table->string('feature_two_icon')->default('fas fa-shipping-fast')->nullable()->after('feature_one_title');
            $table->string('feature_two_title')->default('Fast Home Delivery')->nullable()->after('feature_two_icon');

            $table->string('about_title')->nullable();
            $table->string('about_name')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
             $table->dropColumn(['feature_one_icon', 'feature_one_title', 'feature_two_icon', 'feature_two_title','about_title','about_name']);
        });
    }
};
