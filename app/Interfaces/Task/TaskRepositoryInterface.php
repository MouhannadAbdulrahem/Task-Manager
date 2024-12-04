<?php

namespace App\Interfaces\Task;

use App\Custom\CustomPaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public function all(): Collection;
    public function paginate(int $perPage = 15): CustomPaginator;
    public function show(string $modelId): Model;
    public function create(array $data): Model;
    public function update(string $modelId, array $data): Model;
    public function delete(string $modelId): void;
    public function with(array|string $relations);
    public function orderBy(string $column, string $direction = 'ASC');
    public function withExists(array|string $relations);
    public function allowedSorts(): array;
    public function allowedFilters(): array;
    public function allowedIncludes(): array;
    public function allowedFields(): array;
}
