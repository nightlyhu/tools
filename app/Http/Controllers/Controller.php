<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected function successResponse(array $data): JsonResponse {
        return response()->json(array_merge(
            ['success' => true], $data
        ));
    }

    protected function errorResponse(string $message): JsonResponse {
        return response()->json([
            'success' => false,
            'message' => $message
        ]);
    }
}
