<?php

namespace App\Http\Controllers\Dashboard\Task;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DataTransferObjects\Task\TaskDTO;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Interfaces\Task\TaskServiceInterface;

class TaskController extends Controller
{
    public function __construct(protected TaskServiceInterface $service) {}

    public function index()
    {
        $tasks = $this->service->with('user')->index();
        if (request()->ajax()) {
            return view('Dashboard.Task.Sections.indexTable', compact('tasks'));
        }
        return view('Dashboard.Task.index', compact('tasks'));
    }

    public function create()
    {
        return view('Dashboard.Task.create');
    }

    public function store(CreateTaskRequest $request)
    {
        $this->service->create(TaskDTO::fromRequest($request));

        Session::flash('successMessage', 'Created successfully');

        return to_route('dashboard.tasks.index');
    }
    public function edit(string $taskId)
    {
        $task = $this->service->show($taskId);

        return view('Dashboard.Task.edit', compact('task'));
    }
    public function update(UpdateTaskRequest $request, string $taskId)
    {
        $this->service->update($taskId, TaskDTO::fromRequest($request));

        Session::flash('successMessage', 'Updated successfully');

        return to_route('dashboard.tasks.index');
    }
    public function delete(string $taskId)
    {
        $this->service->delete($taskId);

        Session::flash('successMessage', 'Deleted successfully');

        return to_route('dashboard.tasks.index');
    }
}
