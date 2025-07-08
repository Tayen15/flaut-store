<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->foreignId('catalog_id')->constrained('catalogs')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories_catalogs')->onDelete('cascade');
            $table->primary(['catalog_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
