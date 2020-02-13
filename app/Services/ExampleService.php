<?php

namespace App\Services;

use App\Repositories\Eloquent\ExampleRepository;

class ExampleService {

    /**
     * @var ExampleRepository
     */
    private $exampleRepository;

    /**
     * ExampleService constructor.
     * @param ExampleRepository $exampleRepository
     */
    public function __construct(ExampleRepository $exampleRepository)
    {
        $this->exampleRepository = $exampleRepository;
    }

    /**
     * @return ExampleRepository
     */
    public function repository(): ExampleRepository
    {
        return $this->exampleRepository;
    }
}
