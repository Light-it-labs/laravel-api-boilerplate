<?php

use App\Repositories\ExampleRepositoryInterface;
use Illuminate\Database\Seeder;

class ExamplesTableSeeder extends Seeder
{
    /**
     * @var ExampleRepositoryInterface
     */
    private $exampleRepository;

    /**
     * ExamplesSeeder constructor.
     * @param ExampleRepositoryInterface $exampleRepository
     */
    public function __construct(ExampleRepositoryInterface $exampleRepository)
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
