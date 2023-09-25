<?php

namespace Database\Factories;

use App\Models\TaskFrequency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaskFrequencyFactory extends Factory
{
    protected $model = TaskFrequency::class;

    public function definition()
    {
        return [
            'pattern' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
