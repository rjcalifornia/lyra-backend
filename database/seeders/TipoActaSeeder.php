<?php

namespace Database\Seeders;

use App\Models\TipoActa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoActaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipoActas = [
            [
                "nombre" => "Presidente",
                "codigo" => "PRE",
                "activo" => true,
                "usuario_crea" => 1,
            ],
            [
                "nombre" => "Diputados",
                "codigo" => "DIP",
                "activo" => true,
                "usuario_crea" => 1,
            ],
            [
                "nombre" => "Alcaldes",
                "codigo" => "ALC",
                "activo" => true,
                "usuario_crea" => 1,
            ],
        ];
        TipoActa::insert($tipoActas);
    }
}
