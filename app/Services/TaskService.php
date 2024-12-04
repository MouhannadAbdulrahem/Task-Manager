<?php

namespace App\Services;

use App\Interfaces\Task\TaskRepositoryInterface;
use App\Services\BaseService;
use App\Interfaces\Task\TaskServiceInterface;

class TaskService  extends BaseService implements TaskServiceInterface
{
    public function __construct(protected TaskRepositoryInterface $repository) {}
}
