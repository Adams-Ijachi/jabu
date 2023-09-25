<?php

namespace App\Livewire\Group;

use App\Action\TaskGroups\CreateTaskGroupAction;
use App\Http\Requests\CreateTaskGroupRequest;
use LivewireUI\Modal\ModalComponent;

class CreateGroup extends ModalComponent
{

    public string $name;
    public string $description;

    public  function rules (): array
    {
        return (new CreateTaskGroupRequest())->rules();
    }

    public function create(): void
    {
        $this->validate();

        app(CreateTaskGroupAction::class)->create($this->all());

        $this->dispatch('groupCreated')->to('group.GroupsList');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.group.create-group');
    }
}
