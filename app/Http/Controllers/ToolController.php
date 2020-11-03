<?php

namespace App\Http\Controllers;

use App\Services\ToolService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ToolController extends Controller {

    private ToolService $toolService;

    public function __construct(ToolService $toolService) {
        $this->toolService = $toolService;
    }

    /**
     * Generate hash.
     * POST /tool/generate-hash
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function generateHash(Request $request): JsonResponse {
        $text = $request->get('text', '');
        $algorithm = $request->get('algorithm', '');

        if (!$text || !$algorithm) {
            return $this->errorResponse("Missing text!");
        }

        $result = $this->toolService->hash($algorithm, $text);
        if (!$result) {
            return $this->errorResponse("Problem with generating!");
        }

        return $this->successResponse(['result' => $result]);
    }

    /**
     * Generate password.
     * POST /tool/generate-pass
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function generatePass(Request $request): JsonResponse {
        $length = (int)$request->get('length', 1);
        $strength = $request->get('strength', '');

        $result = $this->toolService->generatePassword($length, $strength);
        if (!$result) {
            return $this->errorResponse("Problem with generating!");
        }

        return $this->successResponse(['result' => $result]);
    }

    /**
     * Encode or decode text.
     * POST /tool/encoder
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function encoder(Request $request): JsonResponse {
        $text = $request->get('input', '');
        $method = $request->get('method', 'base64');
        $action = $request->get('action', 'encode');

        if (!$text) {
            return $this->errorResponse("Missing text!");
        }

        $result = $this->toolService->encoding($method, $action, $text);
        if (!$result) {
            return $this->errorResponse("Problem with encoding/decoding!");
        }

        return $this->successResponse(['result' => $result]);
    }

    /**
     * Transform text.
     * POST /tool/text-transform
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function textTransform(Request $request): JsonResponse {
        $text = $request->get('input', '');
        $action = $request->get('action', 'uppercase');
        $multiple = $request->get('multiple', 'false') == 'true';

        if (!$text) {
            return $this->errorResponse("Missing text!");
        }

        $result = $this->toolService->textTransform($action, $multiple, $text);
        if (!$result) {
            return $this->errorResponse("Problem with transform!");
        }

        return $this->successResponse(['result' => $result]);
    }

}
