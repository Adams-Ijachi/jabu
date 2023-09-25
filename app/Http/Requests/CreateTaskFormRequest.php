<?php

namespace App\Http\Requests;

use App\Enums\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTaskFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'iteration_count' => ['required', 'integer', 'min:1'],
            'description' => ['required', 'string'],
            'task_group_id' => ['nullable','integer', 'exists:task_groups,id'],
            'task_frequency_id' => ['required', 'integer', 'exists:task_frequencies,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
