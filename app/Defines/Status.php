<?php


namespace App\Defines;


class Status
{
    const  _PUBLISH = 'PUBLISH';
    const _PRERELEASE = 'PRERELEASE';
    const _RELEASE = 'RELEASE';
    const _PRIVATE = 'PRIVATE';


    public static function getLists(): array
    {
        return [
            self::_PRIVATE => 'Riêng tư',
            self::_PRERELEASE => 'Chuẩn bị phát hành',
            self::_RELEASE => 'Đã phát hành',
            self::_PUBLISH => 'Công khai',
        ];
    }

}
