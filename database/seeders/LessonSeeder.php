<?php

namespace Database\Seeders;

use App\Defines\Status;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
            [
                'name' => 'Mở đầu về Javascript',
                'slug' => 'mo-dau-ve-javascript',
                'description' => 'Bài học mở đầu hoy',
                'chapter_id' => 1,
                'video_url' => 'ScNsBpQ8KIg',
                'status' => Status::_PUBLISH,
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
             ],
            [
                'name' => 'Biến trong javascript',
                'slug' => 'bien-trong-javascript',
                'description' => 'Bài học mở đầu hoy',
                'chapter_id' => 1,
                'order' => 2,
                'video_url' => 'ScNsBpQ8KIg',
                'status' => Status::_PUBLISH,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hằng Javascript',
                'slug' => 'hang-trong-javascript',
                'description' => 'Bài học mở đầu hoy',
                'order' => 3,
                'chapter_id' => 1,
                'video_url' => 'ScNsBpQ8KIg',
                'status' => Status::_PUBLISH,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Vòng lặp trong Javascript',
                'slug' => 'vong-lap-trong-javascript',
                'description' => 'Vòng lặp nha',
                'chapter_id' => 2,
                'order' => 1,
                'video_url' => 'ScNsBpQ8KIg',
                'status' => Status::_PUBLISH,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hàm trong Javascript',
                'slug' => 'ham-trong-javascript',
                'description' => 'Vòng lặp nha',
                'chapter_id' => 2,
                'order' => 2,
                'video_url' => 'ScNsBpQ8KIg',
                'status' => Status::_PUBLISH,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
