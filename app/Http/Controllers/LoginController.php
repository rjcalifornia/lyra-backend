<?php

namespace App\Http\Controllers;
use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' =>  'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::with(['rol'])->where('email', $request['email'])->first();

        if(!$user){
            return response()->json(['message' => 'Por favor, revise los datos ingresados'], 422);
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Verifique los datos ingresados e intente nuevamente'], 401);
        }

        //|| $user->rol->nombre != RolesEnum::ADMINISTRADOR)
        return response()->json([
            'msg' => 'Credenciales correctas',
            'url' => route('homepage'),
        ]);


    }
}
