<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    public function run(): void
    {
        $user = \App\Models\User::factory(1)->create();

        \App\Models\TaskGroup::factory(2)->create([
            'user_id' => $user->first()->id,
        ]);
    }
}
