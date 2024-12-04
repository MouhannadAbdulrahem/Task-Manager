<?php

namespace App\Interfaces\Task;

use App\DataTransferObjects\Task\TaskDTO;

interface TaskServiceInterface
{
    public function all();
    public function index();
    public function show(string $taskId);
    public function create(TaskDTO $DTO);
    public function update(string $taskId, TaskDTO $DTO);
    public function delete(string $taskId);
}
