<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class APIBaseController extends Controller
{
    /**
     * success response method.
     *
     * @param $result
     * @param $message
     * @param int $httpStatusCode
     * @return JsonResponse
     */
    public function sendResponse($result, $message, $httpStatusCode = JsonResponse::HTTP_OK): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => $message,
            'errors' => null,
        ];

        # pagination fix
        if ($result instanceof AnonymousResourceCollection) {
            $response = array_merge($response, $result->response()->getData(true));
        } else {
            $response['data'] = $result;
        }

        return new JsonResponse($response, $httpStatusCode);
    }

    /**
     * return error response.
     *
     * @param null $errors
     * @param string $message
     * @param int $httpStatusCode
     * @return JsonResponse
     */
    public function sendError($errors = null, $message = '', $httpStatusCode = JsonResponse::HTTP_NOT_FOUND): JsonResponse
    {
        $response = [
            'success' => false,
            'data' => null,
            'message' => $message,
            'errors' => $errors,
        ];

        return new JsonResponse($response, $httpStatusCode);
    }

    /**
     * return error OAuth response.
     *
     * @param $message
     * @param string $errorType
     * @param int $httpStatusCode
     * @return JsonResponse
     */
    public function sendOAuthError($message, $errorType = '', $httpStatusCode = JsonResponse::HTTP_BAD_REQUEST): JsonResponse
    {
        $response = [
            'error' => $errorType,
            'error_description' => $message,
            'message' => $message,
        ];

        return new JsonResponse($response, $httpStatusCode);
    }
}
