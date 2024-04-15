<?php

namespace Database\Seeders;

use App\Models\PartidoTipoEleccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartidoTipoEleccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PartidoTipoEleccion::create([
            'id_partido' => 1,
            'id_tipo_acta' => 1,
            'municipio_id' => 1,
            'activo' => true,
            'usuario_crea' => 1,
        ]);
        PartidoTipoEleccion::create([
            'id_partido' => 2,
            'id_tipo_acta' => 1,
            'municipio_id' => 1,
            'activo' => true,
            'usuario_crea' => 1,
        ]);
        PartidoTipoEleccion::create([
            'id_partido' => 3,
            'id_tipo_acta' => 1,
            'municipio_id' => 1,
            'activo' => true,
            'usuario_crea' => 1,
        ]);
        PartidoTipoEleccion::create([
            'id_partido' => 1,
            'id_tipo_acta' => 3,
            'municipio_id' => 1,
            'activo' => true,
            'usuario_crea' => 1,
        ]);
        PartidoTipoEleccion::create([
            'id_partido' => 2,
            'id_tipo_acta' => 3,
            'municipio_id' => 1,
            'activo' => true,
            'usuario_crea' => 1,
        ]);


        PartidoTipoEleccion::create([
            'id_partido' => 1,
            'id_tipo_acta' => 2,
            'departamento_id' => 1,
            'activo' => true,
            'usuario_crea' => 1,
        ]);
        PartidoTipoEleccion::create([
            'id_partido' => 2,
            'id_tipo_acta' => 2,
            'departamento_id' => 1,
            'activo' => true,
            'usuario_crea' => 1,
        ]);
        PartidoTipoEleccion::create([
            'id_partido' => 3,
            'id_tipo_acta' => 2,
            'departamento_id' => 1,
            'activo' => true,
            'usuario_crea' => 1,
        ]);

    }
}
