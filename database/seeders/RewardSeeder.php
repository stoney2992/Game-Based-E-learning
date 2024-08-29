<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('rewards')->insert([
            ['name' => '1 pad of paper', 'description' => 'A high-quality pad of paper.', 'points_required' => 70],
            ['name' => '2 notebooks', 'description' => 'Two durable notebooks.', 'points_required' => 150],
            ['name' => '1 set of crayons', 'description' => 'A colorful set of crayons.', 'points_required' => 40],
            ['name' => '1 pencil', 'description' => 'A reliable pencil for writing.', 'points_required' => 30],
        ]);
    }
}
