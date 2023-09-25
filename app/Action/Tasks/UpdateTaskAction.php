<?php

namespace App\Action\Tasks;

class UpdateTaskAction
{

        public function update(array $inputs)
        {
            $task = $inputs['task'];
            $task->name = $inputs['name'];
            $task->description = $inputs['description'];
            $task->start_date = $inputs['start_date'];
            $task->end_date = $inputs['end_date'];
            $task->iteration_count = $inputs['iteration_count'];
            $task->task_group_id = $inputs['task_group_id'];
            $task->status = $inputs['status'];
            $task->task_frequency_id = $inputs['task_frequency_id'];
            $task->user_id = \Auth::id();
            $task->save();
            return $task;
        }
}
