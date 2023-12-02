<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends BaseController
{


    public function __invoke(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'user_name' => ['required', 'string', 'max:255', 'unique:users'],
                'device_name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'confirmed', Password::defaults()],
            ]);
            $user = User::create([
                'name' => $request->name,
                'user_name' => $request->user_name,
                'device_name' => $request->device_name,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken($request->device_name)->plainTextToken;
            return $this->handleResponse(['user' => new UserResource($user),'access_token' => $token, 'token_type' => 'Bearer'],"succes");


        } catch (Exception $e) {
            return $this->handleError($e->getMessage());
        }

    }
}
