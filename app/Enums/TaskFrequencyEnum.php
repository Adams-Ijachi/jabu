<?php

namespace App\Enums;

enum TaskFrequencyEnum:string
{

    case everyDay = 'every day';
    case everyMonday = 'every Monday';
    case everyMondayWednesdayFriday = 'every Monday, Wednesday and Friday';
    case every5thOfEachMonth = 'every 5th of each month';
    case every5thOfMarchOfEachYear = 'every 5th of March of each year';

    public static function getValues(): array
    {
        return [
            self::everyDay,
            self::everyMonday,
            self::everyMondayWednesdayFriday,
            self::every5thOfEachMonth,
            self::every5thOfMarchOfEachYear,
        ];
    }

}
