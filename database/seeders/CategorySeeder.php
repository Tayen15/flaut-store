<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriesCatalog as Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Fashion Pria', 'Fashion Wanita', 'Sepatu', 'Tas', 'Aksesoris'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
