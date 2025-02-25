<?php
namespace App\Services;

use App\Models\Institution;
use Illuminate\Support\Facades\DB;
use Exception;

class InstitutionService
{
    public function createInstitution(array $data)
    {
        return DB::transaction(function () use ($data) {
            $institution = Institution::create($data);
            return $institution;
        });
    }

    public function updateInstitution(int $id, array $data)
    {
        $institution = Institution::findOrFail($id);

        DB::transaction(function () use ($institution, $data) {
            $institution->update($data);
        });

        return $institution;
    }
}
