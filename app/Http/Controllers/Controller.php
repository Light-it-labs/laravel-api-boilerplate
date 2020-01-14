<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Return a Response with a proper payload format
     * @param array $payload
     * @param string message
     * @param int $status
     * @param array $headers
     * @return JsonResponse
     */
    protected function jsonResponse(array $payload,
                                    string $message = '',
                                    int $status = Response::HTTP_OK,
                                    array $headers = []): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $payload,
            'status' => $status
        ], $status, $headers);
    }
}
