<?php

namespace App\Enums;

enum TaskFilterEnum : string
{
    case All = 'all';

    case Pending = 'pending';
    case Completed = 'completed';

    public static function getValues(): array
    {
        return [
            self::All,
            self::Completed,
            self::Pending,
        ];
    }

}
