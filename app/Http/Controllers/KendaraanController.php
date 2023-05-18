<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Traits\ReturnResponse;
use App\Http\Requests\KendaraanRequest;
use App\Http\Resources\KendaraanResource;
use App\Services\Kendaraan\KendaraanService;

class KendaraanController extends Controller
{
    use ReturnResponse;
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
        try {
            $this->kendaraanService->destroy($kendaraan);
            return $this->ResReturn(true, "Data Berhasil Dihapus");
        } catch (\Throwable $th) {
            return $this->ResReturn(false, "Data Gagal Dihapus");
        }
    }
}
