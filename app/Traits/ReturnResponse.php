<?php

namespace App\Traits;

trait ReturnResponse
{
    public function ResReturn($data, $message)
    {
        if ($data == true) {
            return response()->json([
                'data' => [
                    'success' => true,
                    'code' => 200,
                    'message' => $message
                ]
            ], 200);
        }
        else{
            return response()->json([
                'data' => [
                    'success' => false,
                    'code' => 400,
                    'message' => $message
                ]
            ], 400);
        }
    }
}
