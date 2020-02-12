<?php

namespace App\Repository;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface RepositoryInterface
{
    /**
     * @param array $relations
     * @return Collection
     */
    public function all(array $relations = []): Collection;

    /**
     * @param int $page
     * @param int $perPage
     * @param array $relations
     * @return Collection
     */
    public function paginate(int $page, int $perPage, array $relations = []): Collection;

    /**
     * @param array $attributes
     * @return Model
     */
    public function store(array $attributes): Model;

    /**
     * @param int $id
     * @param array $attributes
     * @return Model
     */
    public function update(int $id, array $attributes): Model;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @param int $id
     * @param array $relations
     * @return Model
     */
    public function find(int $id, array $relations): ?Model;
}
