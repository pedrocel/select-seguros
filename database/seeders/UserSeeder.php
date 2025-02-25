<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PerfilModel;
use App\Models\UserPerfilModel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criação do usuário
        $user = User::create([
            'name' => 'pedro',
            'email' => 'pedronovaisengcp@gmail.com',
            'password' => Hash::make('123456789'), // Substitua por uma senha segura
        ]);

        // Criação dos perfis
        $perfilAdmin = PerfilModel::create(['name' => 'Administrador']);
        $perfilCliente = PerfilModel::create(['name' => 'Cliente']);

        // Associação do usuário com o perfil "Administrador"
        UserPerfilModel::create([
            'user_id' => $user->id,
            'perfil_id' => $perfilAdmin->id,
            'is_atual' => 1, // Define como perfil atual
            'status' => 1,   // Ativo
        ]);
    }
}
