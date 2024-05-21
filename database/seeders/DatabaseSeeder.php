<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\postseeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([postSeeder::class]);
    }
}
