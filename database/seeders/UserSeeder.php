<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fullname' => 'John Doe',
            'username' => 'johndoe',
            'rol_id' => 1,
            'phone' => '2000-0001',
            'email' => 'johndoe@example.com',
            'email_verified_at' => null,
            'password' => bcrypt('1234567'),
            'is_admin' => false,
            'active' => true,
            
            ]);
    }
}
