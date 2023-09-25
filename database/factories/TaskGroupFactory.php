<?php

namespace Database\Factories;

use App\Models\TaskGroup;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaskGroupFactory extends Factory
{
    protected $model = TaskGroup::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(500),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
