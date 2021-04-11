<?php


namespace App\Defines;


class Level
{
//    private static $_EASY = 'EASY';
//    private static $_MEDIUM = 'MEDIUM';
//    private static $_HARD = 'HARD';

    const _EASY = 'EASY';
    const _MEDIUM = 'MEDIUM';
    const _HARD = 'HARD';



    public static function getLists(): array
    {
        return [
            self::_EASY => 'Dễ',
            self::_MEDIUM => 'Trung bình',
            self::_HARD => 'Khó'
        ];
    }


}
