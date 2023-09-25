<?php

namespace Database\Seeders;

use App\Enums\TaskFrequencyEnum;
use Illuminate\Database\Seeder;

class TaskFrequencySeeder extends Seeder
{
    public function run(): void
    {

        $taskFrequencyEnumValues = TaskFrequencyEnum::getValues();

        collect($taskFrequencyEnumValues)->each(function ($taskFrequencyEnumValue) {
            \App\Models\TaskFrequency::factory()->create([
                'pattern' => $taskFrequencyEnumValue,
            ]);
        });

    }
}
