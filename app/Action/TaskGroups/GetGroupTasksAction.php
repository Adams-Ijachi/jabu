<?php

namespace App\Action\TaskGroups;

use App\Action\Tasks\GetTasksAction;
use App\Models\Task;
use App\Models\TaskGroup;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class GetGroupTasksAction
{

    public function getGroupTasks($group_id)
    {

        $tasks = Auth::user()
                        ->tasks()
                        ->with('taskGroup', 'taskFrequency')
                        ->where('task_group_id', $group_id)
                        ->get();

       return app(GetTasksAction::class)->getTasksByDate($tasks);


    }
}
