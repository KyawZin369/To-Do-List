<?php

namespace Database\Seeders;

use App\Models\post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        post::factory()->count(1000)->create();
    }
}
