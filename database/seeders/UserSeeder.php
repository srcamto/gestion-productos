<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');
        
        $vendedor = User::create([
            'name' => 'Vendedor',
            'email' => 'vendedor@example.com',
            'password' => Hash::make('password'),
        ]);
        $vendedor->assignRole('vendedor');
        
        $this->command->info('Usuarios creados:');
        $this->command->info('- admin@example.com / password (Rol: admin)');
        $this->command->info('- vendedor@example.com / password (Rol: vendedor)');
    }
}