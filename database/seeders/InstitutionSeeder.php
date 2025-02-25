<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Institution;
use App\Models\InstitutionAddress;
use App\Models\InstitutionPhone;
use App\Models\Phone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criação de um telefone para a instituição
        $phone = Phone::create([
            'phone_number' => '31987654321', // Exemplo de número de telefone
            'status' => 1 // Ativo
        ]);

        // Criação de um endereço para a instituição
        $address = Address::create([
            'street' => 'Rua Exemplo',
            'street_number' => '123',
            'city' => 'Cidade Exemplo',
            'state' => 'EX',
            'neighborhood' => 'Bairro Exemplo',
            'zip_code' => '12345-678',
            'status' => 1 // Ativo
        ]);

        // Usando o id 1 para o responsável
        $responsibleUserId = 1;

        // Criação da instituição
        $institution = Institution::create([
            'name' => 'Instituição Exemplo',
            'registration_mec' => 'MEC123456',
            'type' => 'Escola',
            'id_responsible' => $responsibleUserId, // Usando o id 1 para o responsável
            'email' => 'instituicao@exemplo.com',
            'email_aux' => 'instituicao_aux@exemplo.com'
        ]);

        // Atribuindo o telefone à instituição
        InstitutionPhone::create([
            'id_institution' => $institution->id,
            'id_phone' => $phone->id,
            'status' => 1
        ]);

        // Atribuindo o endereço à instituição
        InstitutionAddress::create([
            'id_institution' => $institution->id,
            'id_address' => $address->id,
            'status' => 1
        ]);
    }
}
