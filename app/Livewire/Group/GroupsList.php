<?php

namespace App\Livewire\Group;

use App\Models\TaskGroup;
use Livewire\Component;
use Livewire\WithPagination;

class GroupsList extends Component
{
    use WithPagination;

    protected $listeners = [
        'groupCreated' => '$refresh',
    ];
    public function render()
    {
        return view('livewire.group.groups-list',
        [
            'groups' => TaskGroup::where('user_id',\Auth::id())
                ->latest()->paginate(4),
        ]);
    }
}
