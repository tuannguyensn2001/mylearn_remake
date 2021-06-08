<?php


namespace App\Defines;


class Classroom
{
    const _TEACHER = 'TEACHER';
    const _STUDENT = 'STUDENT';

    public static function getLists(): array
    {
        return [
            self::_TEACHER => trans('classroom.teacher'),
            self::_STUDENT => trans('classroom.student'),
        ];
    }
}
