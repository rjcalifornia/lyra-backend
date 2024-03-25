<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Enums\PermisosEnum;
use App\Utils\PolicyUtil;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class TransmisorPolicy
{
    use HandlesAuthorization;

    public function listarTransmision(User $user){
        return PolicyUtil::hasPermiso($user, PermisosEnum::VER_MIS_TRANSMISIONES);
    }

    public function verTransmision(User $user)
    {
        return PolicyUtil::hasPermiso($user, PermisosEnum::VER_DETALLE_TRANSMISION);
    }


    public function crearTransmision(User $user)
    {
        return PolicyUtil::hasPermiso($user, PermisosEnum::TRANSMITIR_RESULTADOS);
    }

    public function adjuntarComprobanteTransmision(User $user)
    {
        return PolicyUtil::hasPermiso($user, PermisosEnum::ADJUNTAR_COMPROBANTE);
    }

    public function verJuntasReceptoras(User $user)
    {
        return PolicyUtil::hasPermiso($user, PermisosEnum::VER_JUNTAS_RECEPTORAS);
    }

}
