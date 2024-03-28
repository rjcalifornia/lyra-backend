<?php

namespace Database\Seeders;

use App\Models\JuntasReceptoras;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JuntaReceptoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JuntasReceptoras::create([
            'correlativo' => 1,
            'id_centro_votacion' => 1,
            'activo' => true,
            'usuario_crea' => 1,
            'usuario_modifica' => 1,
        ]);
    }
}
