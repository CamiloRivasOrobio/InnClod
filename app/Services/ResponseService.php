<?php
namespace App\Services;

class ResponseService
{
    public function result($succeeded = false, $message = null, $error = null, $data = [], $token = null)
    {
        return response()
            ->json([
                'succeeded' => $succeeded,
                'message' => $message,
                'error' => $error,
                'data' => $data,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
    }
    public function pagedResult($succeeded = false, $message = null, $error = null, $data = [], $pageNumber, $pageSize, $totalItems)
    {
        return response()
            ->json([
                'succeeded' => true,
                'message' => null,
                'error' => null,
                'data' => $data,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'totalItems' => $totalItems,
            ]);
    }
}