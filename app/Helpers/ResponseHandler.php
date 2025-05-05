<?php

namespace App\Helpers;

use App\Enums\HttpStatusCode;

class ResponseHandler
{
    public static function success($message, $data = [], $statusCode = HttpStatusCode::HTTP_OK)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    public static function error($message, $statusCode = HttpStatusCode::HTTP_INTERNAL_SERVER_ERROR, $errors = [])
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
        ], $statusCode);
    }
}
