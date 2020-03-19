<?php

namespace App\Http\Controllers;

use App\Services\ToolService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ToolController extends Controller {

    /**
     * @var ToolService
     */
    private $toolService;

    public function __construct(ToolService $toolService) {
        $this->toolService = $toolService;
    }

    public function generateHash(Request $request) {
        $text = $request->get('text', '');
        $algorithm = $request->get('algorithm', '');

        if (!$text || !$algorithm) {
            return response()->json(['success' => false, 'message' => 'Missing data!']);
        }

        $hash = $this->toolService->hash($algorithm, $text);

        if ($hash) {
            return response()->json(['success' => true, 'result' => $hash]);
        }

        return response()->json(['success' => false, 'message' => 'Problem with generation!']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function generatePass(Request $request) {
        $length = (int)$request->get('length', 1);
        $strength = $request->get('strength', '');

        $password = $this->toolService->generatePassword($length, $strength);

        if ($password) {
            return response()->json(['success' => true, 'result' => $password]);
        }

        return response()->json(['success' => false, 'message' => 'Problem with generation!']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function encoder(Request $request) {
        $text = $request->get('input', '');
        $method = $request->get('method', 'base64');
        $action = $request->get('action', 'encode');

        if (!$text) {
            return response()->json(['success' => false, 'message' => 'Missing data!']);
        }

        $result = $this->toolService->encoding($method, $action, $text);

        if ($result) {
            return response()->json(['success' => true, 'result' => $result]);
        }

        return response()->json(['success' => false, 'message' => 'Problem with encoding/decoding!']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function textTransform(Request $request) {
        $text = $request->get('input', '');
        $action = $request->get('action', 'uppercase');
        $multiple = $request->get('multiple', 'false') == 'true';

        if (!$text) {
            return response()->json(['success' => false, 'message' => 'Missing data!']);
        }

        $result = $this->toolService->textTransform($action, $multiple, $text);

        if ($result) {
            return response()->json(['success' => true, 'result' => $result]);
        }

        return response()->json(['success' => false, 'message' => 'Problem with transform!']);
    }

}
