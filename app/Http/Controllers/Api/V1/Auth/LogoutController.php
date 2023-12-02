<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

/**
 * @group Logout
 */
class LogoutController extends BaseController
{

    public function __invoke(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'user_name' => 'required|string|max:255'
            ]);
            if ($validator->fails()) {
                return $this->handleError($validator->errors()->all());
            }

            $user = User::where('user_name', $request->user_name)->first();

            if ($user) {
                $user->tokens()->delete();
                return [
                    'msg' => 'لقد قمت بتسجيل الخروج بنجاح'
                ];
            } else {
                return response([
                    'msg' => 'أنت لم تقوم بتسجيل الدخول باستخدام هذا الرقم'
                ], 401);
            }
        } catch (Exception $e) {
            return $this->handleError($e->getMessage());
        }
    }
}
