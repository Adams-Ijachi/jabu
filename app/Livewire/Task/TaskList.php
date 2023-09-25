<?php

namespace App\Livewire\Task;

use App\Action\Tasks\GetTasksAction;
use App\Enums\TaskFilterEnum;
use App\Enums\TaskStatusEnum;
use App\Http\Requests\CreateTaskFormRequest;
use Livewire\WithPagination;
use LivewireUI\Modal\ModalComponent;

class TaskList extends ModalComponent
{
    use WithPagination;

    public string $name;
    public string $description;
    public string $start_date;
    public string $end_date;
    public string $status;
    public int $iteration_count;
    public int $task_group_id;
    public int $task_frequency_id;

    public string $filter_value = "" ;

    protected $listeners = [
        'taskCreated' => '$refresh',
        'taskUpdated' => '$refresh',
        'taskDeleted' => '$refresh',
    ];

    public  function rules (): array
    {
        return (new CreateTaskFormRequest())->rules();
    }

    public function render()
    {

        $tasks = app(GetTasksAction::class)->getTasks(filter: $this->filter_value);

        return view('livewire.task-list',
        [
                'taskCollection' => $tasks,
                'filters' => TaskFilterEnum::getValues(),
        ],
        );
    }
}
