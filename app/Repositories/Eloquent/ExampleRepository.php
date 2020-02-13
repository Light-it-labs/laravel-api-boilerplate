<?php

namespace App\Repositories\Eloquent;

use App\Models\Example;

class ExampleRepository extends BaseRepository
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
