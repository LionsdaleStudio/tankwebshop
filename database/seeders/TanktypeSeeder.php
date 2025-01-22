<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TanktypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("tanktypes")->insert([
            [
                "type" => "Tigris",
                "model" => "1",
            ],
            [
                "type" => "Tigris",
                "model" => "2",
            ],
            [
                "type" => "T34",
                "model" => "76",
            ],
            [
                "type" => "T34",
                "model" => "85",
            ]
        ]);
    }
}
