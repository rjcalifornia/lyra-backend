<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ActaElectoral;
use Illuminate\Http\Request;

class TransmisionController extends Controller
{
    public function obtenerTransmisiones(Request $request){

        $actas = ActaElectoral::where('id_centro_votacion', $request->dispositivo->id_centro_votacion)->get();

        return response()->json(['transmisiones'=> $actas], 200);
    }

    public function almacenarTransmision(){

    }
}
