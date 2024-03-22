<?php

namespace App\Http\Controllers\api;

use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Dispositivos;
use App\Models\User;


class AuthenticationController extends Controller
{


    public function autenticarDispositivo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo_validacion' => 'required',
            //'id_dispositivo' =>  'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dispositivo = Dispositivos::where('codigo_autorizacion', $request->codigo_validacion)->where('validado', false)->where('activo', true)->first();

        if (!$dispositivo) {
            return response()->json(['message' => 'Dispositivo no pudo ser autenticado. Revise los datos ingresados e intente nuevamente'], 422);
        }

        $user = User::where('id', $dispositivo->id_usuario)->where('activo', true)->first();

        if (!$user) {
            return response()->json(['message' => 'Revise los datos ingresados'], 401);
        }

        $dispositivo->validado = true;
        //$dispositivo->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 'user' => $user]);
    }
}
