<?php

use App\Livewire\Group\CreateGroup;
use App\Livewire\Group\GroupsList;
use App\Models\User;

beforeEach(function () {
    $this->seed(\Database\Seeders\TaskFrequencySeeder::class);
    $this->seed(\Database\Seeders\TasksSeeder::class);
    $this->seed(\Database\Seeders\GroupsSeeder::class);

});

test('user can see groups', function () {
    $user = User::first();
    $this->actingAs($user);
    $this->get(route('groups'))
        ->assertStatus(200)
        ->assertSeeLivewire(GroupsList::class);

    Livewire::test(GroupsList::class)
        ->assertViewHas('groups' , function ($groups) {
            return $groups->count() === 2;
        });
});

test('user can create group', function () {

    $this->actingAs(user());

    Livewire::test(CreateGroup::class)
        ->set('name', 'test')
        ->set('description', 'test')
        ->call('create')
        ->assertDispatched('groupCreated')
        ->assertSuccessful();

    $this->assertDatabaseHas('task_groups', [
        'name' => 'test',
        'description' => 'test',
    ]);

});


