<?php


namespace App\Traits;


use Illuminate\Support\Facades\Storage;

trait StorageFile
{

    /**
     * @param $file
     * @param $path
     * @param string $disk
     * @return false|string
     */

    public function uploadFile($file, $path, $disk = 'local')
    {
        return Storage::disk($disk)->putFile($path, $file);
    }
}
