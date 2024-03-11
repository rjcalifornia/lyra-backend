<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
use App\Enums\RolesEnum;
use App\Models\RolPermiso;
use App\Models\User;
use App\Models\Roles;
use App\Models\Permiso;


class RolPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $superAdminUser = User::where('username', RolesEnum::ADMIN)->firstOrFail();
        $roles = Roles::all();
        $permisosRol = [];
        $now = Carbon::now();
        foreach ($roles as $rol) {
            $permisos = Permiso::whereIn('nombre', RolesEnum::getPermisosDeRol($rol->nombre))->get();
            foreach ($permisos as $permiso) {
                $permisosRol[] = [
                    'id_rol' => $rol->id,
                    'id_permiso' => $permiso->id,
                    'activo' => true,
                    'usuario_crea' => $superAdminUser->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }
        RolPermiso::insert($permisosRol);

    }
}
