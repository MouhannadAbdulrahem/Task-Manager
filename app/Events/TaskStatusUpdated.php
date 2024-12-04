<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class TaskStatusUpdated implements ShouldBroadcast, ShouldQueue
{
    use InteractsWithSockets, SerializesModels;

    public $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function broadcastOn()
    {
        return new \Illuminate\Broadcasting\PrivateChannel('tasks.' . $this->task->user_id);
    }

    public function broadcastWith()
    {
        return [
            'task_id' => $this->task->id,
            'status' => $this->task->status,
            'title' => $this->task->title,
        ];
    }
}
