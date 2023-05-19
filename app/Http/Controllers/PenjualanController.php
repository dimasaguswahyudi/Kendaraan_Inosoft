<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenjualanRequest;
use App\Http\Resources\PenjualanResource;
use App\Models\Penjualan;
use Illuminate\Http\JsonResponse;
use App\Services\Penjualan\PenjualanService;

class PenjualanController extends Controller
{
    private PenjualanService $penjualanService;

    public function __construct(PenjualanService $penjualanService)
    {
        $this->penjualanService = $penjualanService;
    }

    public function index()
    {
        $data = $this->penjualanService->index();
        return PenjualanResource::collection($data);
    }
    public function getPenjualan($kendaraan_id)
    {
        $data = $this->penjualanService->getPenjualan($kendaraan_id);
        return $data;
    }
    public function store(PenjualanRequest $request)
    {
        $data = $this->penjualanService->store($request->all());
        return $data;
    }
    public function update(PenjualanRequest $request, Penjualan $penjualan)
    {
        $data = $this->penjualanService->update($request->all(), $penjualan);
        return $data;
    }
    public function destroy(Penjualan $penjualan)
    {
       $data = $this->penjualanService->destroy($penjualan);
       return $data;
    }
}
