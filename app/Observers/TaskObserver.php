<?php

namespace App\Observers;

use App\Models\Task;
use App\Events\TaskStatusUpdated;

class TaskObserver
{
    public function updating(Task $task): void
    {
        if ($task->isDirty('status')) broadcast(new TaskStatusUpdated($task));
    }
}
