<?php

namespace Database\Seeders;

use App\Models\ResponsibleType;
use Illuminate\Database\Seeder;

class ResponsibleTypeSeeder extends Seeder
{
    public function run()
    {
        ResponsibleType::create([
            'name' => 'Responsável Legal',
            'description' => 'Responsável legal pelo aluno, com autoridade para decisões jurídicas.'
        ]);
        ResponsibleType::create([
            'name' => 'Responsável Temporário',
            'description' => 'Responsável temporário que cuida do aluno em algumas situações específicas.'
        ]);
        ResponsibleType::create([
            'name' => 'Responsável Financeiro',
            'description' => 'Responsável pelas questões financeiras do aluno, como pagamento de mensalidades.'
        ]);
        ResponsibleType::create([
            'name' => 'Responsável Educacional',
            'description' => 'Responsável pela educação e acompanhamento acadêmico do aluno.'
        ]);
        ResponsibleType::create([
            'name' => 'Responsável Emergencial',
            'description' => 'Responsável em casos de emergência ou situações imprevistas.'
        ]);
        ResponsibleType::create([
            'name' => 'Responsável Médico',
            'description' => 'Responsável pela saúde e cuidados médicos do aluno.'
        ]);
        ResponsibleType::create([
            'name' => 'Responsável Legal Provisório',
            'description' => 'Responsável legal temporário, com autoridade limitada por período específico.'
        ]);
        ResponsibleType::create([
            'name' => 'Responsável Virtual/Online',
            'description' => 'Responsável que assume suas responsabilidades de forma remota ou online.'
        ]);
    }
}
