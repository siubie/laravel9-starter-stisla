<?php


namespace Utils;


use Exception;
use Illuminate\Http\JsonResponse;

class ApiResponseUtils
{

    public static function response($result, $messageSuccess = ''): JsonResponse
    {
        if ($result instanceof Exception) {
            return ApiResponseUtils::base(["message" => $result->getMessage()], $result->getMessage(), 400);
        } else {
            return ApiResponseUtils::base($result, $messageSuccess);
        }
    }

    public static function base($data, $message = '', $status = 200): JsonResponse
    {
        return response()->json([
            "message" => $message,
            "data" => $data,
        ], $status);
    }

    public static function exportResponse($result)
    {
        if ($result instanceof Exception) {
            return ApiResponseUtils::base(["message" => $result->getMessage()], $result->getMessage(), 400);
        } else {
            return $result;
        }
    }

    public static function importResponse($result, $messageSuccess = ''): JsonResponse
    {
        if ($result instanceof Exception) {
            return ApiResponseUtils::base(["message" => $result->getMessage()], $result->getMessage(), 400);
        } else {
            return ApiResponseUtils::base([], $messageSuccess);
        }
    }


}
