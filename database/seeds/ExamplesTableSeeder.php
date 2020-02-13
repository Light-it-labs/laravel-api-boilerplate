<?php

use App\Repository\Eloquent\ExampleRepository;
use Illuminate\Database\Seeder;

class ExamplesTableSeeder extends Seeder
{
    /**
     * @var ExampleRepository
     */
    private $exampleRepository;

    /**
     * ExamplesSeeder constructor.
     * @param ExampleRepository $exampleRepository
     */
    public function __construct(ExampleRepository $exampleRepository)
    {
        $this->exampleRepository = $exampleRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory($this->exampleRepository->model(), 100)->create();
    }
}
