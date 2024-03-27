<?php

namespace App\Utils;

use App\Models\User;
use Illuminate\Support\Facades\Log;

abstract class PolicyUtil
{
    public static function hasPermiso(User $user, String $nombrePermiso)
    {
        $allow = false;
        if ($user->rol) {
            foreach ($user->rol->permisos as $permiso) {
                if ($permiso->nombre == $nombrePermiso) {
                    $allow = true;
                    // return true;
                }
            }
            // Log::info($user->rol->permisos);
        }

        /* foreach ($user->permisosEspeciales as $permisoEspecial) {
            if ($permisoEspecial->nombre == $nombrePermiso) {
                // return true;
                $allow = true;
            }
        } */
        if ($allow) {
            Log::debug("Usuario $user->nombre_completo con resultado aprobado para permiso $nombrePermiso");
        } else {
            Log::debug("Usuario $user->nombre_completo con resultado denegado para permiso $nombrePermiso");
        }
        // Log::info($user->permisosEspeciales);
        // return false;
        return $allow;
    }
}
