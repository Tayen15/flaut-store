<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add soft deletes to catalogs (products)
        Schema::table('catalogs', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to brands
        Schema::table('brands', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to categories_catalogs
        Schema::table('categories_catalogs', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to product_variants
        Schema::table('product_variants', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to orders
        Schema::table('orders', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to users
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove soft deletes from catalogs
        Schema::table('catalogs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Remove soft deletes from brands
        Schema::table('brands', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Remove soft deletes from categories_catalogs
        Schema::table('categories_catalogs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Remove soft deletes from product_variants
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Remove soft deletes from orders
        Schema::table('orders', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        // Remove soft deletes from users
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
