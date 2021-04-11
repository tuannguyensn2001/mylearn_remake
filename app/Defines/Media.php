<?php


namespace App\Defines;


class Media
{
    const _PATH_COURSE = 'public/course';

    public static function convert()
    {
        return [
            self::_PATH_COURSE => 'assets/storage/course'
        ];
    }

}
