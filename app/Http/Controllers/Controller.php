<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnJsonResponse($message, $data=[], $status=TRUE, $response=Response::HTTP_OK): JsonResponse
    {
        Session::put('response_status', $status);

        return response()->json([
            'message'=>$message,
            'data'=>$data,
            'status'=>$status,
        ], $response)
            //            ->header('Access-Control-Allow-Origin', '*')
            ->header('Content-Type', 'application/json;charset=UTF-8')
            //            ->header('Access-Control-Allow-Methods', 'POST, GET, PATCH, PUT')
            ->header('Charset', 'utf-8');
    }
}
