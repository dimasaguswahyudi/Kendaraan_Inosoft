<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotorRequest;
use App\Http\Resources\MotorResource;
use App\Models\Motor;
use App\Services\Motor\MotorService;
use Symfony\Component\HttpFoundation\JsonResponse;

class MotorController extends Controller
{
    private MotorService $motorService;

    public function __construct(MotorService $motorService)
    {
        $this->motorService = $motorService;
    }

    public function index()
    {
        $data = $this->motorService->index();
        return MotorResource::collection($data);
    }

    public function store(MotorRequest $request)
    {
        $data = $this->motorService->store($request->all());
        return $data;
    }

    public function update(MotorRequest $request, Motor $motor)
    {
        $data = $this->motorService->update($request->all(), $motor);
        return $data;
    }
    public function destroy(Motor $motor)
    {
        $data = $this->motorService->destroy($motor);
        return $data;
    }
}
