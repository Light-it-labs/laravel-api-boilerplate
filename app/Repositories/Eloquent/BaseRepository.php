<?php

namespace App\Repositories\Eloquent;

use App\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $relations
     * @return Collection
     */
    public function all(array $relations = []): Collection
    {
        return $this->model->with($relations)->get();
    }

    /**
     * @param int $page
     * @param int $perPage
     * @param array $relations
     * @return Collection
     */
    public function paginate(int $page, int $perPage, array $relations = []): Collection
    {
        // TODO: Implement paginate() method.
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function store(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param int $id
     * @param array $attributes
     * @return Model
     */
    public function update(int $id, array $attributes): Model
    {
        $model = $this->find($id);
        $model->update($attributes);
        return $model;
    }

    /**
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function delete(int $id): bool
    {
        $model = $this->find($id);
        return $model->delete();
    }

    /**
     * @param int $id
     * @param array $relations
     * @return Model|null
     */
    public function find(int $id, array $relations): ?Model
    {
        return $this->model->with($relations)->findOrFail($relations);
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return get_class($this->model);
    }
}
