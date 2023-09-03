<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'role_code' => 'LEC',
            'description' => 'LECTURER',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'role_code' => 'STD',
            'description' => 'STUDENT',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
