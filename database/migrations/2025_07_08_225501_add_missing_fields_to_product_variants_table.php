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
        Schema::table('product_variants', function (Blueprint $table) {
            $table->string('name')->after('catalog_id');
            $table->decimal('compare_at_price', 10, 2)->nullable()->after('price');
            $table->boolean('track_quantity')->default(true)->after('stock_quantity');
            $table->boolean('is_active')->default(true)->after('is_default');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropColumn(['name', 'compare_at_price', 'track_quantity', 'is_active']);
        });
    }
};
