<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClassAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('class_assignments')->insert([
            'class_code' => 'CLS0001',
            'title' => 'TUGAS 1',
            'description' => 'Silahkan kerjakan 读一读 记一记 nomor 1 - 5',
            'type' => 'ASSIGNMENT',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('class_assignments')->insert([
            'class_code' => 'CLS0001',
            'title' => 'LATIHAN 1',
            'description' => 'Silahkan kerjakan 读一读 记一记 nomor 6 - 10',
            'type' => 'EXERCISE',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('class_assignments')->insert([
            'class_code' => 'CLS0002',
            'title' => 'TUGAS 1',
            'description' => 'Silahkan kerjakan 读一读 记一记 nomor 1 - 10',
            'type' => 'ASSIGNMENT',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
