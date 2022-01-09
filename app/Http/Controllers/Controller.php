<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends
    BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $data
     * @return ResponseFactory|Response
     */
    public function returnSuccess($data)
    {
        $response = [
            'status'  => true,
            'message' => 'Success',
            'data'    => $data,
        ];

        return response($response, 200);
    }

    /**
     * @param  string  $message
     * @param  string  $data
     * @return ResponseFactory|Response
     */
    public function returnFalse(
        string $message = 'failed',
        string $data = 'No Data Found'
    ) {
        $response = [
            'status'  => false,
            'message' => $message,
            'data'    => $data,
        ];

        return response($response, 200);
    }
}
