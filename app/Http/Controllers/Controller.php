<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function responseFailValidation($errors)
    {
        return response()->json([
            'success' => false,
            'message' => $errors
        ], 422);
    }

    public function responseError($msg, $code, $error = null)
    {
        return response()->json([
            'success' => false,
            'message' => $msg,
            'error' => $error,
        ], $code);
    }

    public function responseSuccess($msg = null)
    {
        return response()->json([
            'success' => true,
            'message' => $msg,
        ], 200);
    }

    public function responseSuccessWithData($msg = null, $data = null)
    {
        return response()->json([
            'success' => true,
            'message' => $msg,
            'data' => $data
        ], 200);
    }

    public function responseCreated($msg = null, $data = null)
    {
        return response()->json([
            'success' => true,
            'message' => $msg,
            'data' => $data
        ], 201);
    }
}