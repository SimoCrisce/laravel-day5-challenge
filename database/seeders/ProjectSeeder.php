<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('projects')->insert([
                'title' => fake()->words(rand(3, 5), true),
                'content' => fake()->words(20, true),
                'user_id' => rand(1, 5),
            ]);
        }
    }
}