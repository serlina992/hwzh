<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LearningMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('learning_materials')->insert([
            'module_code' => '1A',
            'title' => 'ALAT OLAHRAGA',
            'description' => 'Mempelajari Kosa kata mandarin yang berkaitan dengan alat olahraga',
            'material_link' => 'hanyu-1.pdf',
            'video_link' => 'https://youtu.be/MKcOg3lPXvg?list=RDMKcOg3lPXvg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('learning_materials')->insert([
            'module_code' => '1A',
            'title' => 'MATERI PINYIN',
            'description' => 'Mempelajari Kosa kata mandarin yang berkaitan dengan materi pinyin',
            'material_link' => 'hanyu-1.pdf',
            'video_link' => 'https://youtu.be/MKcOg3lPXvg?list=RDMKcOg3lPXvg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('learning_materials')->insert([
            'module_code' => '1A',
            'title' => 'PERKENALAN DIRI',
            'description' => 'Mempelajari Kosa kata mandarin yang berkaitan dengan perkenalan diri dan cara penggunaannya',
            'material_link' => 'hanyu-1.pdf',
            'video_link' => 'https://youtu.be/MKcOg3lPXvg?list=RDMKcOg3lPXvg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('learning_materials')->insert([
            'module_code' => '1A',
            'title' => 'PANGGILAN ORANGTUA',
            'description' => 'Mempelajari Kosa kata mandarin yang berkaitan dengan panggilan orangtua yang sopan',
            'material_link' => 'hanyu-1.pdf',
            'video_link' => 'https://youtu.be/MKcOg3lPXvg?list=RDMKcOg3lPXvg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('learning_materials')->insert([
            'module_code' => '1A',
            'title' => 'PENGENALAN WAKTU',
            'description' => 'Mempelajari Kosa kata mandarin yang berkaitan dengan pengenalan waktu',
            'material_link' => 'hanyu-1.pdf',
            'video_link' => 'https://youtu.be/MKcOg3lPXvg?list=RDMKcOg3lPXvg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
