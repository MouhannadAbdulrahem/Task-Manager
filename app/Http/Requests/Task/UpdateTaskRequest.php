<?php

namespace App\Http\Requests\Task;

use App\Enums\TaskStatus;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'status' => ['nullable', 'string', Rule::enum(TaskStatus::class)],
            'user_id' => ['nullable', 'string', 'exists:users,id'],
        ];
    }
}
