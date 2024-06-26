<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(PermisoSeeder::class);
        $this->call(RolPermisoSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(DistritoSeeder::class);
        $this->call(TipoActaSeeder::class);
        if (App::Environment() === 'local')
        {
            $this->call(CentroVotacionSeeder::class);
            $this->call(JuntaReceptoraSeeder::class);
            $this->call(DispositivoSeeder::class);
            $this->call(PartidoSeeder::class);
            $this->call(PartidoTipoEleccionSeeder::class);
        }

    }
}
