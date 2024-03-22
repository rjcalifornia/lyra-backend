<?php

namespace Database\Seeders;

use App\Models\CentroVotacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CentroVotacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CentroVotacion::create([
        'nombre' => 'Centro Escolar San Ramon',
        'id_distrito' => 1,
        'cantidad_mesas_votacion'  => 8,
        'activo' => true,
        'usuario_crea' => 1,
        'usuario_modifica' => 1
        ]);
    }
}
