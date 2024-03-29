<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dispositivos;
use App\Models\JuntasReceptoras;
use App\Models\PartidosPoliticos;
use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    public function obtenerJuntasReceptoras(Request $request){

        $juntasReceptoras = JuntasReceptoras::with(['idCentroVotacion', 'usuarioCrea', 'usuarioModifica'])->where('id_centro_votacion', $request->dispositivo->id_centro_votacion)->get();

        return response()->json(['juntas_receptoras' => $juntasReceptoras], 200);
    }

    public function obtenerPartidosPoliticos(Request $request){
        $partidos = PartidosPoliticos::with(['usuarioCrea', 'usuarioModifica'])->get();
        return response()->json(['partidos' => $partidos], 200);
    }
}
