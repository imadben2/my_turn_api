<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends BaseController
{


    public function __invoke(Request $request)
    {
        try {
            $request->validate([
                'user_name' => 'required|string',
                'password' => 'required|string',
            ]);

            $credentials = request(['user_name', 'password']);

            if (!Auth::attempt($credentials)) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $device = substr($request->userAgent() ?? '', 0, 255);
            $expiresAt = $request->remember ? null : now()->addMinutes(config('session.lifetime'));

            $user = User::where('user_name', $request->user_name)->first();

            $token = $user->createToken('auth_token')->plainTextToken;

            return $this->handleResponse(['user' => new UserResource($user),'access_token' => $token, 'token_type' => 'Bearer'],"succes");

        } catch (Exception $e) {
            return $this->handleError($e->getMessage());
        }
    }

}
