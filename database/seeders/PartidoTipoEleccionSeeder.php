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
            'partido_id' => 1,
            'tipo_acta_id' => 1,
            'activo' => true,
        ]);
        PartidoTipoEleccion::create([
            'partido_id' => 2,
            'tipo_acta_id' => 1,
            'activo' => true,
        ]);
        PartidoTipoEleccion::create([
            'partido_id' => 3,
            'tipo_acta_id' => 1,
            'activo' => true,
        ]);
        PartidoTipoEleccion::create([
            'partido_id' => 1,
            'tipo_acta_id' => 3,
            'activo' => true,
        ]);
        PartidoTipoEleccion::create([
            'partido_id' => 2,
            'tipo_acta_id' => 3,
            'activo' => true,
        ]);

    }
}
