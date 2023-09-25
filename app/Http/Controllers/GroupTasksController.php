<?php

namespace App\Http\Controllers;

use App\Action\TaskGroups\GetGroupTasksAction;
use App\Action\Tasks\GetTasksAction;
use App\Models\TaskGroup;

class GroupTasksController extends Controller
{
    public function index(TaskGroup $group)
    {
        $tasks = app(GetGroupTasksAction::class)->getGroupTasks(group_id: $group->id);

        return view('pages.group-tasks' ,
        [
            'group' => $group,
            'tasks' => $tasks,
        ]);
    }
}
