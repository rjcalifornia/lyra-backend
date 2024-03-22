<?php

namespace Database\Seeders;

use App\Models\Dispositivos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DispositivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dispositivos::create([
        'id_usuario' => 4,
        'id_centro_votacion' => 1,
        'codigo_autorizacion' => '887598',
        'validado' => false,
        'activo' => true,
        'usuario_crea' => 1,
        'usuario_modifica' => 1
        ]);
    }
}
