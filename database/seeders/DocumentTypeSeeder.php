<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $documentTypes = [
            ['name' => 'Certidão de Nascimento', 'is_required' => true],
            ['name' => 'Comprovante de Residência', 'is_required' => true],
            ['name' => 'Histórico Escolar', 'is_required' => true],
            ['name' => 'Carteira de Vacinação', 'is_required' => true],
            ['name' => 'RG do Responsável', 'is_required' => true],
            ['name' => 'CPF do Responsável', 'is_required' => true],
            ['name' => 'RG do Estudante', 'is_required' => true],
            ['name' => 'CPF do Estudante', 'is_required' => true],
        ];

        DB::table('document_types')->insert($documentTypes);

    }
}