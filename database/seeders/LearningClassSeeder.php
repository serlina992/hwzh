<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LearningClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('learning_classes')->insert([
            'class_code' => 'LEC',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('learning_classes')->insert([
            'class_code' => 'CLS0001',
            'module_code' => '1A',
            'description' => 'Kelas 1A [senin rabu jumat] [Jam 8 malam]',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('learning_classes')->insert([
            'class_code' => 'CLS0002',
            'module_code' => '1A',
            'description' => 'Kelas 1A [selasa kamis sabtu] [Jam 8 malam]',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('learning_classes')->insert([
            'class_code' => 'CLS0003',
            'module_code' => '1B',
            'description' => 'Kelas 1B [senin rabu jumat] [Jam 8 malam]',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('learning_classes')->insert([
            'class_code' => 'CLS0004',
            'module_code' => '1B',
            'description' => 'Kelas 1B [selasa kamis sabtu] [Jam 8 malam]',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('learning_classes')->insert([
            'class_code' => 'CLS0005',
            'module_code' => '1A',
            'description' => 'Kelas 1A [senin rabu jumat] [Jam 4 sore]',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('learning_classes')->insert([
            'class_code' => 'CLS0006',
            'module_code' => '1B',
            'description' => 'Kelas 1B [senin rabu jumat] [Jam 4 sore]',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
