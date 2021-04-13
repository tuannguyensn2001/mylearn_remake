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
            'source' => 'public/course/pBW5h4545CKyNKDsLu7r54KPg9jS8XRSlrOK5UX1.png',
            'type' => 'png'
        ]);
    }
}
