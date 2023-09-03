<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ForumCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('forum_comments')->insert([
            'forum_id' => 1,
            'comment' => 'Okay laoshii',
            'user_id' => 'serlina',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
