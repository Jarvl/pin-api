<?php

namespace App\Http\Controllers;

use Response;

class ApiController extends Controller
{
    public $data;

    public function getApiResponse($status_code = 200, $error_message = '')
    {
        if (empty($this->data)) $this->data = array();

        $response_data = array(
            'status_code' => $status_code,
            'data' => array()
        );

        if ($status_code != 200) {
            $response_data['error_message'] = $error_message;
        }

        if (!empty($this->validator) && !$this->validator->passes()) {
            $response_data['data'] = $this->validator->messages();
        }
        else {
            $response_data['data'] = $this->data;
        }

        return Response::json($response_data, $status_code);
    }
}
