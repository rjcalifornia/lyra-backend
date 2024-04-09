<?php

namespace App\Http\Controllers\api;

use App\Enums\TipoActaEnum;
use App\Http\Controllers\Controller;
use App\Models\Dispositivos;
use App\Models\JuntasReceptoras;
use App\Models\PartidosPoliticos;
use App\Models\PartidoTipoEleccion;
use App\Models\TipoActa;
use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    public function obtenerJuntasReceptoras(Request $request){

        $juntasReceptoras = JuntasReceptoras::with(['idCentroVotacion', 'usuarioCrea', 'usuarioModifica'])
                        ->where('id_centro_votacion', $request->dispositivo->id_centro_votacion)
                        ->get();

        return response()->json(['juntas_receptoras' => $juntasReceptoras], 200);
    }

    public function obtenerCandidatos(Request $request, $idTipoEleccion){

        $tipoEleccion = TipoActa::where('id', $idTipoEleccion)->first();
        if (!$tipoEleccion) {
            return response()->json(['message' => 'Hubo un error al procesar los datos'], 422);
        }

        $partidos = PartidoTipoEleccion::with(['idPartido.usuarioCrea','idTipoActa.usuarioCrea','usuarioCrea', 'usuarioModifica'])
                                        ->where('id_tipo_acta', $tipoEleccion->id)
                                        ->where('municipio_id', $request->dispositivo->idCentroVotacion->idDistrito->municipio_id)
                                        ->get();

        if($tipoEleccion->codigo == TipoActaEnum::CONGRESO){
            $partidos = PartidoTipoEleccion::with(['idPartido.usuarioCrea','idTipoActa.usuarioCrea','usuarioCrea', 'usuarioModifica'])
                                        ->where('id_tipo_acta', $tipoEleccion->id)
                                        
                                        ->get();

        }
        
        return response()->json(['partidos' => $partidos], 200);
    }
}
