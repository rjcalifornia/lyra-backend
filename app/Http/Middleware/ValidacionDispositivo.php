<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\Dispositivos;

class ValidacionDispositivo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $dispositivo = Dispositivos::with(['idCentroVotacion.idDistrito'])->where('id_usuario', $user->id)->first();

        if(!$dispositivo){
            return response()->json(['message' => 'Hubo un error al procesar la peticion'], 401);
        }

        $request->merge(['dispositivo' => $dispositivo]);

        return $next($request);
    }
}
