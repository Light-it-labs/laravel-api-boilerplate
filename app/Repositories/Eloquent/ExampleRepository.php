<?php

namespace App\Repositories\Eloquent;

use App\Models\Example;
use App\Repositories\ExampleRepositoryInterface;

class ExampleRepository extends BaseRepository implements ExampleRepositoryInterface
{
    /**
     * ExampleRepository constructor.
     * @param Example $model
     */
    public function __construct(Example $model)
    {
        parent::__construct($model);
    }
}
