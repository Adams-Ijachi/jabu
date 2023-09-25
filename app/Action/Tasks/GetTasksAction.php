<?php

namespace App\Action\Tasks;

use App\Enums\TaskFilterEnum;
use App\Enums\TaskListEnums;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class GetTasksAction
{

    public function getTasks(string $filter = null): Collection
    {
        $tasks = \App\Models\Task::query()
        ->with('taskGroup', 'taskFrequency')
        ->where('user_id', \Auth::id());

        if (!$filter || $filter === TaskFilterEnum::All->value) {
            $tasks = $tasks->get();
            return $this->getTasksByDate($tasks);
        }

        $tasks = $tasks->where('status', $filter)->get();

        return $this->getTasksByDate($tasks);

    }

    private function getTasksByDateRange($tasks, $start_date, $end_date)
    {
        return $tasks->filter(function ($task) use ($start_date, $end_date) {
            return Carbon::parse($task->start_date)
                ->between($start_date, $end_date) || Carbon::parse($task->end_date)
                ->between($start_date, $end_date);
        })->sortBy('created_at');
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection|array|\LaravelIdea\Helper\App\Models\_IH_Task_C $tasks
     * @return Collection
     */
    public function getTasksByDate(\Illuminate\Database\Eloquent\Collection|array|\LaravelIdea\Helper\App\Models\_IH_Task_C $tasks): Collection
    {
        $tasksToday = $tasks->filter(function ($task) {
            $start_date = \Carbon\Carbon::now();
            $end_date = \Carbon\Carbon::now();

            return $task->start_date->isToday();
        })->sortBy('created_at');


        $tasksTomorrow = $tasks->filter(function ($task) {
            $start_date = \Carbon\Carbon::tomorrow();
            $end_date = \Carbon\Carbon::tomorrow();
            return $task->start_date->isTomorrow();

        })->sortBy('created_at');

        $tasksNextWeek = $this->getTasksByDateRange(
            $tasks,
            \Carbon\Carbon::now()->addWeeks(1)->startOfWeek(),
            \Carbon\Carbon::now()->addWeeks(1)->endOfWeek());

        $tasksInTheNearFuture = $this->getTasksByDateRange(
            $tasks,
            start_date: \Carbon\Carbon::now()->addWeeks(2)->startOfWeek(),
            end_date: \Carbon\Carbon::now()->addWeeks(2)->addDays(30));

        $tasksInTheFuture = $tasks->filter(function ($task) {
            // get tasks that are not due in the next 30 days but not in the next week
            $start_date = \Carbon\Carbon::now()->addWeeks(2)->addDays(31)->startOfWeek();

            return Carbon::parse($task->start_date)->greaterThan($start_date);
        })->sortBy('created_at');


        return collect([
            'Tasks Todayss' => $tasksToday,
            'Tasks Tomorrows' => $tasksTomorrow,
            'Tasks Next Week' => $tasksNextWeek,
            'Tasks in the Near Future' => $tasksInTheNearFuture,
            'Tasks in the Future' => $tasksInTheFuture,
        ]);
    }


}
