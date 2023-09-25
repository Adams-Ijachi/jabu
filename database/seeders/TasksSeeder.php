<?php

namespace Database\Seeders;

use App\Enums\TaskListEnums;
use App\Models\TaskFrequency;
use Database\Factories\TaskFactory;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    public function run(): void
    {
        $user = \App\Models\User::factory(1)->create();

        $taskGroup = \App\Models\TaskGroup::factory(2)->create([
            'user_id' => $user->first()->id,
        ]);

        $taskFrequency = TaskFrequency::all();

        //  today
        $start_date = \Carbon\Carbon::now();
        $end_date = \Carbon\Carbon::now();
        $this->createTasks($taskFrequency, $taskGroup, $user, $start_date, $end_date);

        // tomorrow
        $start_date = \Carbon\Carbon::tomorrow();
        $end_date = \Carbon\Carbon::tomorrow();
        $this->createTasks($taskFrequency, $taskGroup, $user, $start_date, $end_date);

        // next week
        $start_date = \Carbon\Carbon::now()->addWeeks(1)->startOfWeek();
        $end_date = \Carbon\Carbon::now()->addWeeks(1)->endOfWeek();

        $this->createTasks($taskFrequency, $taskGroup, $user, $start_date, $end_date);

        // in the near future is 30 days from next week
        $start_date = \Carbon\Carbon::now()->addWeeks(2);
        $end_date = \Carbon\Carbon::now()->addWeeks(2)->addDays(30);
        $this->createTasks($taskFrequency, $taskGroup, $user, $start_date, $end_date);

        // in the future is 30 day from the near future
        $start_date = \Carbon\Carbon::now()->addWeeks(2)->addDays(31);
        $end_date = \Carbon\Carbon::now()->addWeeks(2)->addDays(60);
        $this->createTasks($taskFrequency, $taskGroup, $user, $start_date, $end_date);

    }

    private function createTasks($taskFrequency, $taskGroup, $user, $startDate, $endDate): void
    {

        \App\Models\Task::factory(3)->create([
            'user_id' => $user->first()->id,
            'task_group_id' => $taskGroup->first()->id,
            'task_frequency_id' => $taskFrequency->first()->id,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);
    }
}
