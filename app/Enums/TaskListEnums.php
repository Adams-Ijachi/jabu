<?php

namespace App\Enums;

enum TaskListEnums : string
{

    case TasksToday = 'Tasks Today';
    case TasksTomorrow = 'Tasks Tomorrow';
    case TasksNextWeek = 'Tasks Next Week';
    case TasksInTheNearFuture = 'Tasks in the Near Future';
    case TasksInTheFuture = 'Tasks in the Future';

    public static function getValues(): array
    {
        return [
            self::TasksToday,
            self::TasksTomorrow,
            self::TasksNextWeek,
            self::TasksInTheNearFuture,
            self::TasksInTheFuture,
        ];
    }

}
