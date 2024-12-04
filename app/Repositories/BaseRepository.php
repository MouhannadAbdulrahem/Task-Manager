<?php

namespace App\Repositories;

use App\Custom\CustomPaginator;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BaseRepository
{
    protected $model = Model::class;
    protected $query;

    public function __construct()
    {
        $this->query = QueryBuilder::for($this->model)
            ->allowedSorts($this->allowedSorts())
            ->allowedFilters($this->allowedFilters())
            ->allowedFields($this->allowedFields())
            ->allowedIncludes($this->allowedIncludes());
    }
    public function setModel(string $model)
    {
        $this->model = $model;
        self::__construct();
    }
    public function all(): Collection
    {
        return $this->query->get();
    }
    public function paginate(int $perPage = 10): CustomPaginator
    {
        return $this->query->paginate($perPage);
    }
    public function show(string $modelId): Model
    {
        return $this->query->findOrFail($modelId);
    }
    public function create(array $data): Model
    {
        return $this->model::create($data);
    }
    public function update(string $modelId, array $data): Model
    {
        $model = $this->query->findOrFail($modelId);

        $model->fill($data);

        $model->save();

        return $model;
    }

    public function delete(string $modelId): void
    {
        $model = $this->query->findOrFail($modelId);

        $model->delete();
    }

    public function scope(string $name, ...$args)
    {
        $this->query->$name(...$args);
        return $this;
    }

    public function with(array|string $relations)
    {
        $this->query->with($relations);
        return $this;
    }
    public function orderBy(string $column, string $direction = 'ASC')
    {
        $this->query->orderBy($column, $direction);
        return $this;
    }

    public function withExists(array|string $relations)
    {
        $this->query->withExists($relations);
        return $this;
    }

    public function allowedSorts(): array
    {
        return [];
    }
    public function allowedFilters(): array
    {
        return [];
    }
    public function allowedIncludes(): array
    {
        return [];
    }
    public function allowedFields(): array
    {
        return [];
    }

    public function ddRawSql()
    {
        $this->query->ddRawSql();
    }
}
