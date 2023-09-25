<?php

namespace App\Livewire\Task;

use App\Action\Tasks\CreateTaskAction;
use App\Action\Tasks\UpdateTaskAction;
use App\Enums\TaskStatusEnum;
use App\Http\Requests\CreateTaskFormRequest;
use App\Models\Task;
use App\Models\TaskFrequency;
use App\Models\TaskGroup;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class EditTask extends ModalComponent
{

    public string $name;
    public string $description;
    public string $start_date;
    public string $end_date;
    public string $status;
    public int $iteration_count;
    public int|null $task_group_id;
    public int $task_frequency_id;
    public Task $task;

    protected $listeners = [
        'taskUpdated' => '$refresh',
    ];

    public function mount(): void
    {
        $this->name = $this->task->name;
        $this->description = $this->task->description;
        $this->start_date = $this->task->db_start_date;
        $this->end_date = $this->task->db_end_date;
        $this->status = $this->task->status->value;
        $this->iteration_count = $this->task->iteration_count;
        $this->task_group_id = $this->task->task_group_id;
        $this->task_frequency_id = $this->task->task_frequency_id;
    }



    public  function rules (): array
    {
        // I would like to use the same rules as the CreateTaskFormRequest because they are the same
        return (new CreateTaskFormRequest())->rules();
    }

    public function update(): void
    {
        $this->validate();

        app(UpdateTaskAction::class)->update($this->all());

        $this->dispatch('taskUpdated')->to('task.TaskList');
        $this->dispatch('taskUpdated')->to('group-tasks.GroupTasksList');


        $this->closeModal();
    }


    public function render()
    {

        return view('livewire.task.edit-task',[
            'groups' => TaskGroup::all(),
            'frequencies' => TaskFrequency::all(),
            'statuses' => TaskStatusEnum::getValues(),

        ]);
    }
}
