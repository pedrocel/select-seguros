<?php

namespace App\Jobs;

use App\Models\Occurrence;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckStudentAbsences implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $students = User::where('role', 'student')->get();

        foreach ($students as $student) {
            // Verifica faltas consecutivas
            $consecutiveAbsences = $this->getConsecutiveAbsences($student);

            // Verifica percentual de faltas semanais
            $weeklyAbsencePercentage = $this->getWeeklyAbsencePercentage($student);

            // Gera ocorrências conforme as regras
            if ($consecutiveAbsences >= 3) {
                $this->createOccurrence($student, '3 dias de faltas consecutivas', 'O aluno faltou 3 dias consecutivos.');
            }
            if ($consecutiveAbsences >= 5) {
                $this->createOccurrence($student, '5 dias de faltas consecutivas', 'O aluno faltou 5 dias consecutivos.');
            }
            if ($weeklyAbsencePercentage >= 20) {
                $this->createOccurrence($student, '20% de faltas semanais', 'O aluno atingiu 20% de faltas na semana.');
            }
        }
    }

    protected function getConsecutiveAbsences(User $student): int
    {
        // Lógica para calcular faltas consecutivas
        // Exemplo: Consultar registros de presença e contar dias consecutivos de falta
        return 3; // Exemplo
    }

    protected function getWeeklyAbsencePercentage(User $student): float
    {
        // Lógica para calcular o percentual de faltas na semana
        // Exemplo: Consultar registros de presença e calcular percentual
        return 25.0; // Exemplo
    }

    protected function createOccurrence(User $student, string $name, string $description)
    {
        // IDs dos usuários responsáveis (exemplo)
        $responsibleId = 1; // ID do responsável
        $secretaryId = 2; // ID da secretaria
        $socialId = 3; // ID do assistente social

        // Cria a ocorrência
        Occurrence::create([
            'name' => $name,
            'description' => $description,
            'id_responsible' => $responsibleId,
            'id_secretary' => $secretaryId,
            'id_social' => $socialId,
            'id_student' => $student->id,
            'duration_days' => 5,
        ]);
    }
}
