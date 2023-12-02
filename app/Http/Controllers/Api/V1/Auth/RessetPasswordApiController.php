<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;
use Otp;
use Hash;
use Validator;

class RessetPasswordApiController extends BaseController
{
    //
    private $otp;

    public function __construct()
    {
        $this->otp = new Otp;
    }

    public function check_otp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => ['required'],
            'otp' => ['required'],
        ]);
        if ($validator->fails()) {
            return $this->handleError($validator->errors()->all());
        }
        $otp2 = $this->otp->validate($request->user_name, $request->otp);
        if (!$otp2->status) {
            return $this->handleError(['error' => $otp2]);
        } else {
            return $this->handleResponse("[]", "succes");
        }
    }


    public function passwordReset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => ['required'],
            'password' => ['required'],
        ]);
        if ($validator->fails()) {
            return $this->handleError($validator->errors()->all());
        }
        $clients = User::where('user_name', '=', $request->user_name)->first();
        $clients->password = \Illuminate\Support\Facades\Hash::make($request->input('password'));
        $clients->save();
        return $this->handleResponse(new ProfileResource($clients), "تم التعديل بنجاح");
    }

}
