<?php

namespace Database\Seeders;

use App\Models\Distritos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Distritos::create([
            'nombre' => 'San Salvador Centro',
            'municipio_id' => 1
        ]);
    }
}
