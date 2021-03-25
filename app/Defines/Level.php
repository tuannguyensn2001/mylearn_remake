<?php


namespace App\Defines;


class Level
{
    private static $_EASY = 'EASY';
    private static $_MEDIUM = 'MEDIUM';
    private static $_HARD = 'HARD';

    /**
     * @return string
     */
    public static function getEASY(): string
    {
        return self::$_EASY;
    }

    /**
     * @return string
     */
    public static function getMEDIUM(): string
    {
        return self::$_MEDIUM;
    }

    /**
     * @return string
     */
    public static function getHARD(): string
    {
        return self::$_HARD;
    }

    public static function getLists(): array
    {
        return [
            self::$_EASY => 'Dễ',
            self::$_MEDIUM => 'Trung bình',
            self::$_HARD => 'Khó'
        ];
    }

}
