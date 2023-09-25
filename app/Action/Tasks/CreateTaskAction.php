<?php

namespace App\Action\Tasks;

use App\Models\Task;

class CreateTaskAction
{

    public function create(array $inputs)
    {

         Task::create([
            'name' => $inputs['name'],
            'description' => $inputs['description'],
            'start_date' => $inputs['start_date'],
            'end_date' => $inputs['end_date'],
            'iteration_count' => $inputs['iteration_count'],
            'task_group_id' => $inputs['task_group_id'] ?? null,
            'task_frequency_id' => $inputs['task_frequency_id'],
            'user_id' => \Auth::id(),
        ]);


    }

}
