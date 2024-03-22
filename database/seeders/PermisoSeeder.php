<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\PermisosEnum;
use App\Models\Permiso;


class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = PermisosEnum::getPermisos();
        $permisosAInsertar = [];
        foreach ($permisos as $permiso) {
            $permisosAInsertar[] = [
                'nombre' => $permiso,
                'activo' => true,
                'usuario_crea'=> 1,
            ];
        }
        Permiso::insert($permisosAInsertar);

    }
}
