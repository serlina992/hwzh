<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_id' => 'admin',
            'password' => bcrypt('1234'),
            'full_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_code' => 'LEC',
            'class_code' => 'LEC',
            'status_code' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'user_id' => 'serlina',
            'password' => bcrypt('1234'),
            'full_name' => 'Selina Xuan',
            'email' => 'serlina@gmail.com',
            'role_code' => 'STD',
            'class_code' => 'CLS0001',
            'status_code' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
