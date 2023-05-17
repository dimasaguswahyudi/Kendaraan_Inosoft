<?php

namespace App\Traits;

trait ReturnResponse
{
    public function ResReturn($data, $message)
    {
        if ($data == true) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => $message
            ], 200);
        }
        else{
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => $message
            ], 400);
        }
    }
}
