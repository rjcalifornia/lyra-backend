<?php

namespace App\Services;

use App\Enums\TipoActaEnum;
use App\Models\PartidoTipoEleccion;
use Illuminate\Support\Facades\Log;
use Exception;

class CatalogoService
{
    public function filtrarCandidatos($request, $tipoEleccion)
    {

        $candidatos = PartidoTipoEleccion::with(['idPartido.usuarioCrea', 'idTipoActa.usuarioCrea', 'usuarioCrea', 'usuarioModifica'])
                ->where('id_tipo_acta', $tipoEleccion->id)
                ->get();

        if ($tipoEleccion->codigo == TipoActaEnum::ALCALDIAS) {
            $candidatos = PartidoTipoEleccion::with(['idPartido.usuarioCrea', 'idTipoActa.usuarioCrea', 'usuarioCrea', 'usuarioModifica'])
                ->where('id_tipo_acta', $tipoEleccion->id)
                ->where('municipio_id', $request->dispositivo->idCentroVotacion->idDistrito->municipio_id)
                ->get();
        }

        if ($tipoEleccion->codigo == TipoActaEnum::CONGRESO) {
            $candidatos = PartidoTipoEleccion::with(['idPartido.usuarioCrea', 'idTipoActa.usuarioCrea', 'usuarioCrea', 'usuarioModifica'])
                ->where('id_tipo_acta', $tipoEleccion->id)
                ->where('departamento_id', $request->dispositivo->idCentroVotacion->idDistrito->municipioId->departamento_id)
                ->get();
        }

        return $candidatos;
    }
}
