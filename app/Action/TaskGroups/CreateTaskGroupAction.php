<?php

namespace App\Action\TaskGroups;

use App\Models\TaskGroup;

class CreateTaskGroupAction
{

    public function create(array $inputs)
    {
        $inputs['user_id'] = \Auth::id() ?? 1;
        return TaskGroup::create([
            'name' => $inputs['name'],
            'description' => $inputs['description'],
            'user_id' => $inputs['user_id'],
        ]);
    }

}
