<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dispositivos;
use App\Models\JuntasReceptoras;

use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    public function obtenerJuntasReceptoras(Request $request){

        $juntasReceptoras = JuntasReceptoras::where('id_centro_votacion', $request->dispositivo->id_centro_votacion)->get();

        return response()->json(['juntas_receptoras' => $juntasReceptoras], 200);
    }
}
