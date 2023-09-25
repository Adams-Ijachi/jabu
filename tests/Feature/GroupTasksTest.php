<?php

use App\Livewire\GroupTasks\GroupTasksList;
use App\Models\User;

beforeEach(function () {
    $this->seed(\Database\Seeders\TaskFrequencySeeder::class);
    $this->seed(\Database\Seeders\TasksSeeder::class);
    $this->seed(\Database\Seeders\GroupsSeeder::class);

});

test('user can see groups tasks', function () {
    $user = User::first();
    $this->actingAs($user);

    $group = $user->taskGroups()->first();

    $groupTasks = $group->tasks()->get();

    $this->get(route('groups.task', $group->id))
        ->assertStatus(200)
        ->assertSeeLivewire(GroupTasksList::class);

    Livewire::test(GroupTasksList::class, ['group' => $group])
        ->assertViewHas('taskCollection' , function ($taskCollection) use ($groupTasks) {
            $allTask = [];
            foreach ($taskCollection as $group => $tasks)
            {
                foreach ($tasks as $task)
                {
                    $allTask[] = $task;
                }
            }
            return count($allTask) === count($groupTasks);
        })
        ->assertSee( $group->name);
});


