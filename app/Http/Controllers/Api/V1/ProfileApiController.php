<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class ProfileApiController extends BaseController
{
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'name' => 'string|max:255',
            'user_name' => 'required|string|max:255|unique:users',
            'date_naissance' => 'date',
            'email' => 'string|email|max:255|unique:users',
            'wilaya' => 'nullable|string|max:255',
            'commune' => 'nullable|string|max:255',
            'groupe_sanguin' => 'nullable|string|max:255',
            'poids' => 'nullable|integer',
            'taille' => 'nullable|integer',
            'maladie_chronique' => 'boolean',
            'affiche_groupe_sanguin' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('id', '=', $request->id)->first();

        if ($user === null) {
            return $this->handleError("this user is not existe");
        }



        $user->name = $request->name;
        $user->user_name = $request->user_name;
        $user->date_naissance = $request->date_naissance;
        $user->email = $request->email;
        $user->wilaya = $request->wilaya;
        $user->commune = $request->commune;
        $user->groupe_sanguin = $request->groupe_sanguin;
        $user->poids = $request->poids;
        $user->taille = $request->taille;
        $user->maladie_chronique = $request->maladie_chronique;
        $user->affiche_groupe_sanguin = $request->affiche_groupe_sanguin;

        $user->save();
        return $this->handleResponse(new ProfileResource($user), "تم التعديل بنجاح");

    }
}
