<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dispositivos;
use App\Models\JuntasReceptoras;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    public function obtenerJuntasReceptoras(Request $request){
        $user = Auth::user();
        $dispositivo = Dispositivos::where('id_usuario', $user->id)->first();

        if(!$dispositivo){
            return response()->json(['message' => 'Hubo un error al procesar la peticion'], 401);
        }
        $juntasReceptoras = JuntasReceptoras::where('id_centro_votacion', $dispositivo->id_centro_votacion)->get();

        return response()->json(['juntas_receptoras' => $juntasReceptoras], 200);
    }
}
