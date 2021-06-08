<?php


namespace App\Defines;


class Content
{
    const _WILL_LEARN = '_WILL_LEARN';
    const _REQUIREMENT = '_REQUIREMENT';

    public static function getLists(): array
    {
        return [
            self::_WILL_LEARN => 'Bạn sẽ học được gì',
            self::_REQUIREMENT => 'Yêu cầu'
        ];
    }

    public static function getListsByKeyValue()
    {
        return [
            [
                'key' => self::_WILL_LEARN,
                'value' => 'Bạn sẽ học được gì',
            ],
            [
                'key' => self::_REQUIREMENT,
                'value' => 'Yêu cầu',
            ]
        ];
    }

}
