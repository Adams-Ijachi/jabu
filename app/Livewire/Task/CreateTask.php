<?php

namespace App\Livewire\Task;

use App\Action\Tasks\CreateTaskAction;
use App\Http\Requests\CreateTaskFormRequest;
use App\Models\TaskFrequency;
use App\Models\TaskGroup;
use LivewireUI\Modal\ModalComponent;

class CreateTask extends ModalComponent
{
    public string $name;
    public string $description;
    public string $start_date;
    public string $end_date;
    public string $status;
    public int $iteration_count;
    public int $task_group_id;
    public int $task_frequency_id;



    public  function rules (): array
    {
        return (new CreateTaskFormRequest())->rules();
    }

    public function create(): void
    {
        $this->validate();

        app(CreateTaskAction::class)->create($this->all());


        $this->dispatch('taskCreated')->to('task.TaskList');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.create-task',
        [
            'groups' => TaskGroup::all(),
            'frequencies' => TaskFrequency::all(),
        ]
        );
    }
}
