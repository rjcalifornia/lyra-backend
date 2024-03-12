<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\RolesEnum;
use App\Models\Roles;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminUser = User::where('email', 'johndoe@example.com')->firstOrFail();
            $roles = RolesEnum::getRoles();
            $rolesInsert= [];
            $now = Carbon::now();
            foreach ($roles as $rol) {
                $rolesInsert[] = [
                    'nombre' => $rol,
                    'codigo' => strtoupper(substr($rol, 0, 3)),
                    'activo' => true,
                    'usuario_crea' => $superAdminUser->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
            Roles::insert($rolesInsert);
    }
}
