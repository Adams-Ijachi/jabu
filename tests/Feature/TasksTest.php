<?php

use App\Livewire\Task\CreateTask;
use App\Livewire\Task\DeleteTask;
use App\Livewire\Task\EditTask;
use App\Livewire\Task\TaskList;
use App\Models\Task;
use App\Models\User;

uses()->group('tasks');

beforeEach(function () {
    $this->seed(\Database\Seeders\TaskFrequencySeeder::class);
    $this->seed(\Database\Seeders\TasksSeeder::class);
    $this->seed(\Database\Seeders\GroupsSeeder::class);
});

test('user can see tasks', function () {
    $user = User::first();
    $this->actingAs($user);

    $this->get(route('tasks'))
        ->assertStatus(200)
        ->assertSeeLivewire(\App\Livewire\Task\TaskList::class);

    Livewire::test(TaskList::class)
        ->assertViewHas('taskCollection' , function ($taskCollection){
            $allTask = [];
            foreach ($taskCollection as $group => $tasks)
            {
                foreach ($tasks as $task)
                {
                    $allTask[] = $task;
                }
            }
            return count($allTask) === Task::count();
        })->assertSee(\App\Enums\TaskListEnums::getValues());
});

test('user can create tasks', function () {

    $user = User::first();
    $this->actingAs($user);

    $group = $user->taskGroups()->first();
    $frequency = \App\Models\TaskFrequency::first();


    Livewire::test(CreateTask::class)
        ->assertViewHas('groups' , \App\Models\TaskGroup::all())
        ->assertViewHas('frequencies' , \App\Models\TaskFrequency::all())
        ->set('name', 'test')
        ->set('description', 'test')
        ->set('start_date', '2021-10-10')
        ->set('end_date', '2021-10-11')
        ->set('status', \App\Enums\TaskStatusEnum::CREATED->value)
        ->set('iteration_count', 1)
        ->set('task_group_id', $group->id)
        ->set('task_frequency_id', $frequency->id)
        ->call('create')
        ->assertDispatched('taskCreated')
        ->assertSuccessful();


    $this->assertDatabaseHas('tasks', [
        'name' => 'test',
        'description' => 'test',
        'start_date' => '2021-10-10',
        'end_date' => '2021-10-11',
        'status' => \App\Enums\TaskStatusEnum::CREATED->value,
        'iteration_count' => 1,
        'task_group_id' => $group->id,
        'task_frequency_id' => $frequency->id,
    ]);

});

test('user can update tasks', function () {

    $user = User::first();
    $this->actingAs($user);

    $task = $user->tasks()->first();

    $group = $user->taskGroups()->first();
    $frequency = \App\Models\TaskFrequency::first();

    Livewire::test(EditTask::class, ['task' => $task])
        ->assertViewHas('groups' , \App\Models\TaskGroup::all())
        ->assertViewHas('frequencies' , \App\Models\TaskFrequency::all())
        ->set('name', 'test')
        ->set('description', 'test')
        ->set('start_date', '2021-10-10')
        ->set('end_date', '2021-10-11')
        ->set('status', \App\Enums\TaskStatusEnum::CREATED->value)
        ->set('iteration_count', 1)
        ->set('task_group_id', $group->id)
        ->set('task_frequency_id', $frequency->id)
        ->call('update')
        ->assertDispatched('taskUpdated')
        ->assertSuccessful();

    expect($task->refresh())
        ->name->toBe('test')
        ->description->toBe('test')
        ->start_date->toDateString()->toBe('2021-10-10')
        ->end_date->toDateString()->toBe('2021-10-11')
        ->status->value->toBe(\App\Enums\TaskStatusEnum::CREATED->value)
        ->iteration_count->toBe(1)
        ->task_group_id->toBe($group->id)
        ->task_frequency_id->toBe($frequency->id);

});
//
test('user can delete tasks', function () {

    $user = User::first();
    $this->actingAs($user);

    $task = $user->tasks()->first();

    Livewire::test(DeleteTask::class, ['task' => $task])
        ->call('delete')
        ->assertDispatched('taskDeleted')
        ->assertSuccessful();

    expect($user->tasks()->count())->toBe(14);
});
