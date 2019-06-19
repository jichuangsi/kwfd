<?php


namespace Common\Traits;


trait ApiResponseTrait
{
    protected function response($data, array $ext = [], $format = 'JSON')
    {
        if (!is_array($data))
            $data = ['code' => 1, 'message' => $data];

        $data = array_merge($data, $ext);

        if (strtoupper($format) == 'JSON') {
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        exit();
    }

    protected function positiveResponse($data = [])
    {
        $this->response(['code' => 0, 'message' => 'ok'], ['data' => $data]);
    }

    protected function negativeResponse($error = '', $data = [])
    {
        $this->response([
            'code' => -1,
            'message' => $error,
        ], ['data' => $data]);
    }
}