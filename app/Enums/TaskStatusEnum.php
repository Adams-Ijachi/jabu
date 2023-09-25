<?php

namespace App\Enums;

enum TaskStatusEnum : string
{
    case CREATED = 'pending';
    case Completed = 'completed';

    public static function getValues(): array
    {
        return [
            self::CREATED,
            self::Completed,
        ];
    }

}

