<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
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

    public function almacenarVotos($acta, $request){

    }

}
