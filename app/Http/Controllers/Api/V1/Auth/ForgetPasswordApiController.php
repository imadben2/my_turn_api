<?php

namespace App\Http\Controllers\Api\V1\Auth;
use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Hash;
use Validator;
class ForgetPasswordApiController extends BaseController
{
    public function forget_password(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'user_name' => 'required|',
            ]);
            $item = User::where('user_name', $request->user_name)->first();

            if ($item === null) {
                return $this->handleError("this user name is not existe");
            }
            $otpGenerator = new Otp();
            $otp = $otpGenerator->generate($item->user_name, 4, 15);
            return $this->handleResponse([$request->user_name,$otp->token], ['succes']);
        } catch (\Exception $e) {
            return $this->handleError($e->getMessage());
        }
    }


}
