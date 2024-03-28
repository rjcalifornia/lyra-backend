<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ActaElectoral;
use App\Models\Dispositivos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransmisionController extends Controller
{
    public function obtenerTransmisiones(Request $request){

        $actas = ActaElectoral::where('id_centro_votacion', $request->dispositivo->id_centro_votacion)->get();

        return response()->json(['transmisiones'=> $actas], 200);
    }

    public function almacenarTransmision(Request $request){
        $validator = Validator::make($request->all(), [
            'id_junta_receptora' => 'integer|required',
            'id_dispositivo' =>  'integer|required',
            'sobrantes' =>  'integer|required',
            'inutilizados' =>  'integer|required',
            'impugnados' =>  'integer|required',
            'nulos' =>  'integer|required',
            'abstenciones' =>  'integer|required',
            'escrutados' =>  'integer|required',
            'faltantes' =>  'integer|required',
            'entregados' =>  'integer|required',
            'id_tipo_acta' =>  'integer|required',
            'partidos' => 'array'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();
        $dispositivo = Dispositivos::where('id_usuario', $user->id)->first();

        $acta = new ActaElectoral;
        $acta->id_junta_receptora = $request->id_junta_receptora;
        $acta->save();
    }
}
