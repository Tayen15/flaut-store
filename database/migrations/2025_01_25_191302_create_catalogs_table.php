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
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->nullable()->index();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->decimal('base_price', 10, 2);
            $table->decimal('selling_price', 10, 2);
            $table->decimal('cost_price', 10, 2)->nullable();
            $table->decimal('weight', 8, 2)->default(0);
            $table->json('dimensions')->nullable(); // {length, width, height}
            $table->string('material')->nullable();
            $table->text('care_instructions')->nullable();
            $table->enum('gender', ['male', 'female', 'unisex', 'kids'])->default('unisex');
            $table->enum('age_group', ['adult', 'teen', 'kids', 'baby'])->default('adult');
            $table->enum('season', ['spring', 'summer', 'fall', 'winter', 'all-season'])->default('all-season');
            $table->enum('status', ['active', 'inactive', 'draft', 'discontinued'])->default('active');
            $table->boolean('is_featured')->default(false);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogs');
    }
};
