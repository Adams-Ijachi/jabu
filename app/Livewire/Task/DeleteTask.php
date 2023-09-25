<?php

namespace App\Livewire\Task;

use App\Action\Tasks\UpdateTaskAction;
use App\Models\Task;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteTask extends ModalComponent
{
    public Task $task;

    public function delete(): void
    {

        $this->task->delete();

        $this->dispatch('taskDeleted')->to('task.TaskList');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.task.delete-task');
    }
}
