<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Definir os perfis
        $profiles = [
            ['name' => 'Administrador Geral', 'status' => 1],
            ['name' => 'Diretor', 'status' => 1],
            ['name' => 'Colaborador', 'status' => 1],
            ['name' => 'Financeiro', 'status' => 1],
            ['name' => 'Cliente', 'status' => 1],
            ['name' => 'Afiliado', 'status' => 1],
            ['name' => 'Vendedor', 'status' => 1],
        ];

        // Inserir os perfis na tabela profiles
        DB::table('perfis')->insert($profiles);
    }
}
