<?php

namespace App\Repositories;

use App\Models\Task;
use Spatie\QueryBuilder\AllowedFilter;
use App\Interfaces\Task\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    protected $model = Task::class;

    public function allowedFilters(): array
    {
        return ['status', AllowedFilter::scope('search'),];
    }
}
