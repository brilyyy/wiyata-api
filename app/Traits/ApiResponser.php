<?php

namespace App\Traits;

trait ApiResponser
{
    public function jsonResponse($code, $msg, $data = null)
    {
        return response()->json([
            'status_code' => $code,
            'message' => $msg,
            'data' => $data
        ], $code);
    }
}
