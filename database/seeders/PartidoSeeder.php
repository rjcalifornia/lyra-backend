<?php

namespace Database\Seeders;

use App\Models\PartidosPoliticos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partidos = [
            [
                'nombre' => 'Partido Uno',
                'siglas' => 'PUN',
                "activo" => true,
                'usuario_crea' => 1,
            ],
            [
                'nombre' => 'Partido Dos',
                'siglas' => 'PAD',
                "activo" => true,
                'usuario_crea' => 1,
            ],
            [
                'nombre' => 'Partido Tres',
                'siglas' => 'PTR',
                "activo" => true,
                'usuario_crea' => 1,
            ]
        ];
        PartidosPoliticos::insert($partidos);
    }
}
