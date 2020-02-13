<?php

namespace App\Http\Controllers;

use App\Messages\ExampleResponseMessage;
use App\Services\ExampleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExampleController extends Controller
{
    /** @var ExampleResponseMessage */
    private $messages;

    /**
     * @var ExampleService
     */
    private $exampleService;

    public function __construct(ExampleResponseMessage $messages, ExampleService $exampleService)
    {
        $this->messages = $messages;
        $this->exampleService = $exampleService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->jsonResponse([
            'examples' => $this->exampleService->repository()->all(),
        ], $this->messages->getStatusMessage(Response::HTTP_OK), Response::HTTP_OK);
    }
}
