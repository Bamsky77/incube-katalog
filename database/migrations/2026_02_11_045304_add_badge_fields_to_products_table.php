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
            $table->boolean('is_free_shipping')->default(false)->after('price');
            $table->boolean('has_installment')->default(false)->after('is_free_shipping');
            $table->decimal('rating', 3, 2)->default(0)->after('has_installment');
            $table->integer('review_count')->default(0)->after('rating');
            $table->string('brand')->nullable()->after('review_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['is_free_shipping', 'has_installment', 'rating', 'review_count', 'brand']);
        });
    }
};
