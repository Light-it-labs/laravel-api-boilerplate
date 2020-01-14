<?php

namespace App\Http\Controllers;

use App\Messages\ExampleResponseMessage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExampleController extends Controller
{
    /** @var ExampleResponseMessage */
    private $messages;

    public function __construct(ExampleResponseMessage $messages)
    {
        $this->messages = $messages;
    }

    public function index()
    {
        return $this->jsonResponse([
            'hello' => 'world',
        ], $this->messages->getStatusMessage(Response::HTTP_OK), Response::HTTP_OK);
    }
}
