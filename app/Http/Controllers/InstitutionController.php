<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstitutionRequest;
use App\Models\Institution;
use App\Services\InstitutionService;
use Illuminate\Http\JsonResponse;

class InstitutionController extends Controller
{
    protected $institutionService;

    public function __construct(InstitutionService $institutionService)
    {
        $this->institutionService = $institutionService;
    }

    public function store(InstitutionRequest $request): JsonResponse
    {
        $institution = $this->institutionService->createInstitution($request->validated());

        return response()->json([
            'message' => 'Institution created successfully',
            'data' => $institution,
        ], 201);
    }

    public function index(): JsonResponse
    {
        $institutions = Institution::with('responsible')->get();
        return response()->json($institutions);
    }

    public function update(InstitutionRequest $request, $id): JsonResponse
    {
        $institution = $this->institutionService->updateInstitution($id, $request->validated());

        return response()->json([
            'message' => 'Institution updated successfully',
            'data' => $institution,
        ]);
    }
}
