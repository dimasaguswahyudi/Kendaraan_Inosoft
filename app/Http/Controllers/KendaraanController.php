<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\KendaraanRequest;
use App\Http\Resources\KendaraanResource;
use App\Models\Kendaraan;
use App\Services\Kendaraan\KendaraanService;

class KendaraanController extends Controller
{
    private KendaraanService $kendaraanService;

    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }
    public function getstok()
    {
        $data = $this->kendaraanService->getStok();
        return KendaraanResource::collection($data);
    }
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->kendaraanService->index()
        ], 200);
    }
    public function store(KendaraanRequest $request): JsonResponse
    {
        return $this->kendaraanService->store($request->all());
    }
    public function update(KendaraanRequest $request, Kendaraan $kendaraan): JsonResponse
    {
        return $this->kendaraanService->updateKendaraan($request->all(), $kendaraan);
    }
}
