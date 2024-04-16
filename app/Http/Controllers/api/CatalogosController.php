<?php

namespace App\Http\Controllers\api;

use App\Enums\TipoActaEnum;
use App\Http\Controllers\Controller;
use App\Models\Dispositivos;
use App\Models\JuntasReceptoras;
use App\Models\PartidosPoliticos;
use App\Models\PartidoTipoEleccion;
use App\Models\TipoActa;
use App\Services\CatalogoService;
use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    protected $catalogoService;

    public function __construct(CatalogoService $catalogoService)
    {
        $this->catalogoService = $catalogoService;
    }

    public function obtenerJuntasReceptoras(Request $request)
    {

        $juntasReceptoras = JuntasReceptoras::with(['idCentroVotacion', 'usuarioCrea', 'usuarioModifica'])
            ->where('id_centro_votacion', $request->dispositivo->id_centro_votacion)
            ->get();

        return response()->json(['juntas_receptoras' => $juntasReceptoras], 200);
    }

    public function obtenerCandidatos(Request $request, $idTipoActa)
    {

        $tipoEleccion = TipoActa::where('id', $idTipoActa)->first();
        if (!$tipoEleccion) {
            return response()->json(['message' => 'Hubo un error al procesar los datos'], 422);
        }

        $partidos = $this->catalogoService->filtrarCandidatos($request, $tipoEleccion);

        return response()->json(['candidatos' => $partidos], 200);
    }

    public function obtenerEleccionesDisponibles(Request $request){
        $elecciones = TipoActa::where('activo', true)->get();

        return response()->json($elecciones, 200);
    }
}
