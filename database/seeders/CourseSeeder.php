<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            [
                'name' => 'Lập trình Javascript',
                'slug' => Str::slug('Lập trình Javascript','-'),
                'description' => 'Học về javascript',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 1,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lập trình NodeJS',
                'slug' => Str::slug('Lập trình NodeJS','-'),
                'description' => 'Học về nodejs',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 2,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Toán lớp 12',
                'slug' => Str::slug('Toán lớp 12','-'),
                'description' => 'Học về toán lớp 12',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 1,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
