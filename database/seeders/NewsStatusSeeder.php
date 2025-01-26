<?php

namespace Database\Seeders;

use App\Models\NewsStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = ['Draft', 'Published', 'Archived'];

        foreach ($status as $s) {
            NewsStatus::create(['status' => $s]);
        }
    }
}
