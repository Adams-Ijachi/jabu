<?php

namespace App\Livewire\GroupTasks;

use App\Action\TaskGroups\GetGroupTasksAction;
use App\Models\TaskGroup;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class GroupTasksList extends Component
{

    public TaskGroup $group;

    protected $listeners = [
        'taskUpdated' => '$refresh',
    ];


    public function render()
    {
        $tasks = app(GetGroupTasksAction::class)->getGroupTasks(group_id: $this->group->id);
        return view('livewire.group-tasks.group-tasks-list',
        [
            'taskCollection' => $tasks,
            'group_name' => $this->group->name,
        ]);
    }
}
