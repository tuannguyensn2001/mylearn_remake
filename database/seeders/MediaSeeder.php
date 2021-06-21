<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::create([
            'source' => 'https://avatar-ex-swe.nixcdn.com/singer/avatar/2019/03/21/0/e/3/d/1553153837657_600.jpg',
            'type' => 'png'
        ]);
    }
}
