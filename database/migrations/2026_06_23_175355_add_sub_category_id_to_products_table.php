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
        Schema::table('products', function (Blueprint $table) {

            if (!Schema::hasColumn('products', 'sub_category_id')) {
                $table->foreignId('sub_category_id')
                    ->nullable()
                    ->after('category_id')
                    ->constrained('sub_categories')
                    ->nullOnDelete();
            }

            if (!Schema::hasColumn('products', 'sold_count')) {
                $table->integer('sold_count')
                    ->default(0)
                    ->after('stock');
            }

            if (!Schema::hasColumn('products', 'rating')) {
                $table->decimal('rating', 3, 2)
                    ->default(0.00)
                    ->after('sold_count');
            }

            if (!Schema::hasColumn('products', 'review_count')) {
                $table->integer('review_count')
                    ->default(0)
                    ->after('rating');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            if (Schema::hasColumn('products', 'sub_category_id')) {
                $table->dropForeign(['sub_category_id']);
                $table->dropColumn('sub_category_id');
            }

            $table->dropColumn([
                'sold_count',
                'rating',
                'review_count'
            ]);
        });
    }
};
