<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class FaceEventsSeeder extends Seeder
{
    public function run(): void
    {
        $periods = [
            'morning' => ['07:00:00', '09:00:00'],
            'afternoon' => ['12:00:00', '14:00:00'],
            'night' => ['18:00:00', '20:00:00']
        ];

        $students = [];

        for ($i = 1; $i <= 500; $i++) {
            $period = array_keys($periods)[$i % 3]; // Alterna entre manhã, tarde e noite
            $time = fake()->dateTimeBetween($periods[$period][0], $periods[$period][1])->format('H:i:s');

            $students[] = [
                'id' => Str::uuid(),
                'name' => "Aluno $i",
                'image' => 'base64_imagem',
                'event' => 'entrada',
                'timestamp' => now()->format('Y-m-d') . ' ' . $time,
                'user_id' => 1,
                'external_id' => '1',
                'group_id' => 1,
                'data' => json_encode([
                    'turma' => 'Turma ' . chr(64 + ($i % 6) + 1),
                    'nivel' => ['Fundamental', 'Médio', 'Superior'][rand(0, 2)]
                ]),
                'organization_id' => Str::uuid(),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('face_events')->insert($students);
    }
}
