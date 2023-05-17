<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotorRequest;
use App\Models\Motor;
use App\Services\Motor\MotorService;
use Symfony\Component\HttpFoundation\JsonResponse;

class MotorController extends Controller
{
    private MotorService $motorService;

    public function __construct(motorService $motorService)
    {
        $this->motorService = $motorService;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->motorService->getAllMotor()
        ], 200);
    }

    public function store(MotorRequest $request): JsonResponse
    {
        return $this->motorService->createMotor($request->all());
    }

    public function update(MotorRequest $request, Motor $motor): JsonResponse
    {
        return $this->motorService->updateMotor($request->all(), $motor);
    }
}
