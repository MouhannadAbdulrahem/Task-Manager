<?php

namespace App\Services;

use App\DataTransferObjects\BaseDTO;
use App\Exceptions\PaginationException;

class BaseService
{
    public function all()
    {
        return $this->repository->all();
    }
    public function index()
    {
        $perPage = request()->query('pageSize', 10);
        if (!is_numeric($perPage)) {
            $perPage = 10;
        }
        $isPaginated = request()->query('paginated', true);
        if ($perPage < 1) {
            PaginationException::invalidPerPageProvided();
        }
        if ($isPaginated) {
            return $this->repository->paginate($perPage);
        }
        return $this->repository->all();
    }

    public function show(string $modelId)
    {
        return $this->repository->show($modelId);
    }
    public function create(BaseDTO $DTO)
    {
        return $this->repository->create($DTO->toArray());
    }
    public function update(string $modelId, BaseDTO $DTO)
    {
        return $this->repository->update($modelId, $DTO->filterNull()->toArray());
    }
    public function delete(string $modelId)
    {
        return $this->repository->delete($modelId);
    }
    public function scope(string $name, ...$args)
    {
        $this->repository->scope($name, ...$args);
        return $this;
    }
    public function with(string|array $relations)
    {
        $this->repository = $this->repository->with($relations);
        return $this;
    }
    public function orderBy(string $column, string $direction = 'ASC')
    {
        $this->repository = $this->repository->orderBy($column, $direction);
        return $this;
    }

    public function withExists(string|array $relations)
    {
        $this->repository = $this->repository->withExists($relations);
        return $this;
    }
}
