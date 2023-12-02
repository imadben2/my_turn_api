<?php


namespace App\Http\Controllers\Api\V1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
class BaseController extends Controller
{
    public function handleResponse($result, $msg)
    {
        $res = [
            'status' => 200,
            'data'    => $result,
            'msg' => $msg,
        ];
        return response()->json($res, 200);
    }
    public function handleError($error, $errorMsg = [], $code = 401)
    {
        $res = [
            'status' => 401,
            'msg' => $error,
        ];
        if(!empty($errorMsg)){
            $res['data'] = $errorMsg;
        }
        return response()->json($res, $code);
    }


}
