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
            'name' => 'Pedro vinicius de souza novais',
            'email' => 'pedronovais@kernelcode.com.br',
            'password' => Hash::make('123456789'),
        ]);

        UserPerfilModel::create([
            'user_id' => $user->id,
            'perfil_id' => 1,
            'is_atual' => 1,
            'status' => 1,
        ]);
    }
}
