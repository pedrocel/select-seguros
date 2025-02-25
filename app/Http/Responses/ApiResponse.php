<?php
namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiResponse
{
    /**
     * Return a success response with data and optional message.
     *
     * @param  mixed  $data
     * @param  string|null  $message
     * @param  int  $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data, ?string $message = null, int $status = 200): JsonResponse
    {
        $token = null;
        if (isset($data['user']) && $data['user'] !== null) {
            $token = JWTAuth::fromUser($data['user']);
        }

        $response = [];

        if (isset($data['user'])) {
            $response['user'] = $data['user'];
        }

        $relationships = ['phones'];

        foreach ($relationships as $relation) {
            if (isset($data[$relation])) {
                $response[$relation] = $data[$relation];
            }
        }

        if ($message !== null) {
            $response['message'] = $message;
        }

        if ($token !== null) {
            $response['token'] = $token;
        }

        return response()->json($response, $status);
    }

    /**
     * Return an error response with optional message.
     *
     * @param  string|null  $message
     * @param  int  $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error(?string $message = null, int $status = 400): JsonResponse
    {
        $response = ['error' => $message ?: 'Something went wrong'];

        return response()->json($response, $status);
    }
}
