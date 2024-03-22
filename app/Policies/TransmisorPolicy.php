<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Enums\PermisosEnum;
use App\Utils\PolicyUtil;
use App\Models\User;

class TransmisorPolicy
{
    use HandlesAuthorization;

    public function listar(User $user){
        return PolicyUtil::hasPermiso($user, PermisosEnum::VER_MIS_TRANSMISIONES);
    }

    public function ver(User $user)
    {
        return PolicyUtil::hasPermiso($user, PermisosEnum::VER_DETALLE_TRANSMISION);
    }


    public function crear(User $user)
    {
        return PolicyUtil::hasPermiso($user, PermisosEnum::TRANSMITIR_RESULTADOS);
    }

    public function adjuntar(User $user)
    {
        return PolicyUtil::hasPermiso($user, PermisosEnum::ADJUNTAR_COMPROBANTE);
    }



}
