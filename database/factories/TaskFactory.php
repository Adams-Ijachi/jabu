<?php

namespace Database\Factories;

use App\Enums\TaskStatusEnum;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        $statusEnumValues = TaskStatusEnum::getValues();
        return [
            'name' => $this->faker->name(),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'status' => $this->faker->randomElement($statusEnumValues),
            'iteration_count' => $this->faker->randomNumber(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
