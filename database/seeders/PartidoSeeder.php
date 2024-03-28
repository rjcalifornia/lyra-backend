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
                'usuario_crea' => 1,
            ],
            [
                'nombre' => 'Partido Dos',
                'siglas' => 'PAD',
                'usuario_crea' => 1,
            ],
            [
                'nombre' => 'Partido Tres',
                'siglas' => 'PTR',
                'usuario_crea' => 1,
            ]
        ];
        PartidosPoliticos::insert($partidos);
    }
}
