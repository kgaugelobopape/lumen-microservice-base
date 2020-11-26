<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * Building success response
     * @param $data
     * @param int $code
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK, $message = "Operation successful")
    {
        return \response()->json(['data' => $data, 'message' => $message, 'status' => $code], $code);
    }

    /**
     * Building error response
     * @param $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code)
    {
        return \response()->json(['error' => $message, 'status' => $code], $code);
    }
}
