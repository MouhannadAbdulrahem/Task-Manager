<?php

namespace App\Http\Controllers\API\Task;

use App\Custom\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Auth;
use App\DataTransferObjects\Task\TaskDTO;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Interfaces\Task\TaskServiceInterface;

class TaskController extends Controller
{
    public function __construct(protected TaskServiceInterface $service)
    {
        $this->service->scope('owner');
    }

    public function index()
    {
        $tasks = $this->service->index();
        return (new Response(TaskResource::collection($tasks)->resource))->success(message: "All tasks.");
    }

    public function show(string $taskId)
    {
        $task = $this->service->show($taskId);
        return (new Response(TaskResource::make($task)))->success(message: "Task Details");
    }
    public function create(CreateTaskRequest $request)
    {
        $request->merge(['user_id' => Auth::id()]);

        $task = $this->service->create(TaskDTO::fromRequest($request));

        return (new Response())->success(message: "Task created successfully.", code: Response::HTTP_CREATED);
    }
    public function update(UpdateTaskRequest $request, string $taskId)
    {
        $this->service->update($taskId, TaskDTO::fromRequest($request));

        return (new Response())->success(message: "Task updated successfully.");
    }
    public function delete(string $taskId)
    {
        $this->service->delete($taskId);

        return (new Response())->success(message: "Task deleted successfully.");
    }
}
