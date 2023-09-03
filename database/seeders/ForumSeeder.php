<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('forums')->insert([
            'title' => 'HSK 1',
            'forum_description' => 'Bagi murid CLS0001, Laoshi ada kasih referensi lain yaitu HSK 1. Tolong nanti dipahamin dan kerjakan latihan 1 ya',
            'forum_image' => 'hsk1.png',
            'class_code' => 'CLS0001',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
