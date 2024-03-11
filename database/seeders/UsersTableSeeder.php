<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Crear un superAdmin
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
        ]);
        $superAdminRole = Role::where('name', 'superAdmin')->first();
        $superAdmin->assignRole($superAdminRole);

        // Crear un admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);

        // Crear un jugador
        $player = User::create([
            'name' => 'Player',
            'email' => 'player@example.com',
            'password' => bcrypt('password'),
        ]);
        $playerRole = Role::where('name', 'player')->first();
        $player->assignRole($playerRole);

        // Crear un colaborador
        $player = User::create([
            'name' => 'PCollaborator',
            'email' => 'collab@example.com',
            'password' => bcrypt('password'),
        ]);
        $playerRole = Role::where('name', 'collaborator')->first();
        $player->assignRole($playerRole);
    }
}
