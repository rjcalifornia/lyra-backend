<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Models\Votos;
use Exception;

class ActaService {

    public function almacenarActa($acta, $request, $tipoActa, $user){
        $acta->id_junta_receptora = $request->id_junta_receptora;
        $acta->id_centro_votacion = $request->id_centro_votacion;
        $acta->id_tipo_acta = $tipoActa->id;
        $acta->sobrantes = $request->sobrantes;
        $acta->inutilizados = $request->inutilizados;
        $acta->impugnados = $request->impugnados;
        $acta->nulos = $request->nulos;
        $acta->abstenciones = $request->abstenciones;
        $acta->escrutados = $request->escrutados;
        $acta->faltantes = $request->faltantes;
        $acta->entregados = $request->entregados;
        $acta->usuario_crea = $user->id;
        $acta->save();

        Log::info($user->nombre_completo . ' ha guardado el acta electoral para la JRV: '. $request->id_junta_receptora);

        return $acta;
    }

    public function almacenarVotos($acta, $request,  $user){
        foreach ($request->resultados as $resultado){
            $votos = new Votos;
            $votos->id_partido = $resultado['id_partido'];
            $votos->id_acta_electoral = $acta->id;
            $votos->votos = $resultado['votos'];
            $votos->usuario_crea = $user->id;
            $votos->save();
        }
    }



}
