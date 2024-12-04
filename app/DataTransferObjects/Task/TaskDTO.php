<?php

namespace App\DataTransferObjects\Task;

use App\DataTransferObjects\BaseDTO;
use App\Enums\TaskStatus;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;

class TaskDTO extends BaseDTO
{
    public function __construct(
        public ?string $title,
        public ?string $description,
        public ?string $status,
        public ?string $user_id,
    ) {}

    public static function fromRequest(CreateTaskRequest|UpdateTaskRequest $request)
    {
        return new self(
            title: $request->validated('title'),
            description: $request->validated('description'),
            status: $request->validated('status', TaskStatus::PENDING->value),
            user_id: $request->validated('user_id'),
        );
    }
}
