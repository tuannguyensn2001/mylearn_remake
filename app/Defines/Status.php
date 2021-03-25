<?php


namespace App\Defines;


class Status
{
    private static $_PUBLISH = 'PUBLISH';
    private static $_PRERELEASE = 'PRERELEASE';
    private static $_RELEASE = 'RELEASE';
    private static $_PRIVATE = 'PRIVATE';

    /**
     * @return string
     */
    public static function getPRIVATE(): string
    {
        return self::$_PRIVATE;
    }

    /**
     * @return string
     */
    public static function getPUBLISH(): string
    {
        return self::$_PUBLISH;
    }

    /**
     * @return string
     */
    public static function getPRERELEASE(): string
    {
        return self::$_PRERELEASE;
    }

    /**
     * @return string
     */
    public static function getRELEASE(): string
    {
        return self::$_RELEASE;
    }

    public static function getLists(): array
    {
        return [
            self::$_PRIVATE => 'Riêng tư',
            self::$_PRERELEASE => 'Chuẩn bị phát hành',
            self::$_RELEASE => 'Đã phát hành',
            self::$_PUBLISH => 'Công khai',
        ];
    }

}
