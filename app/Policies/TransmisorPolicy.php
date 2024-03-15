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

}
