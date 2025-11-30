<?php

namespace App\Helpers;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponseHelper
{
    /**
     * Return a standardized success JSON response.
     */
    public static function success(string $message = "Success", $data = null): JsonResponse
    {
        return response()->json([
            "status" => config('constants.status_code.SUCCESS'),
            "message" => $message,
        ] + $data, JsonResponse::HTTP_OK);
    }
    /**
     * Return a standardized error JSON response.
     */
    public static function error(string $message = "Error", $httpStatusCode): JsonResponse
    {
        return response()->json([
            "status" => config('constants.status_code.FAIL'),
            "message" => $message,
        ], $httpStatusCode);
    }
    /**
     * Return a formatted validation error response.
     */
    public static function validationError($validator)
    {
        $errorMessages = collect($validator->errors()->all())->join("\n");
        return response()->json([
            'status' => config('constants.status_code.FAIL'),
            'message' => $errorMessages
        ], JsonResponse::HTTP_OK);
    }
    /**
     * Return a standardized internal server error response.
     */
    public static function internalServerError()
    {
        return response()->json([
            'status' => config('constants.status_code.FAIL'),
            'message' =>  __('message.INTERNAL_SERVER_ERROR'),
        ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
    }
}
