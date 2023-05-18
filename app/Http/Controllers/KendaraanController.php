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
    public function index()
    {
        $data = $this->kendaraanService->index();
        return KendaraanResource::collection($data);
    }
    public function store(KendaraanRequest $request)
    {
        $data = $this->kendaraanService->store($request->all());
        return KendaraanResource::make($data);
    }
    public function update(KendaraanRequest $request, Kendaraan $kendaraan)
    {
        $data = $this->kendaraanService->update($request->all(), $kendaraan);
        return KendaraanResource::make($data);
    }
    public function destroy(Kendaraan $kendaraan)
    {
        dd($kendaraan);
        return $this->kendaraanService->destroy($kendaraan);
    }
}
