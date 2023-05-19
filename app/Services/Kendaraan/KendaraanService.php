<?php

namespace App\Services\Kendaraan;

use App\Repositories\Kendaraan\KendaraanRepository;
use App\Traits\ReturnResponse;

class KendaraanService
{
    use ReturnResponse;
    private KendaraanRepository $KendaraanRepository;

    public function __construct(KendaraanRepository $KendaraanRepository)
    {
        $this->KendaraanRepository = $KendaraanRepository;
    }

    public function getStok()
    {
        return $this->KendaraanRepository->getStok();
    }

    public function index()
    {
        return $this->KendaraanRepository->index();
    }

    public function store($request)
    {
        try {
            $this->KendaraanRepository->store($request);
            return $this->ResReturn(true, "Kendaraan Berhasil Diinput");
        } catch (\Throwable $th) {
            return $this->ResReturn(false, "Kendaraan Gagal Diinput");
        }
    }
    public function update($request, $kendaraan)
    {
        try {
            $this->KendaraanRepository->update($request, $kendaraan);
            return $this->ResReturn(true, "Kendaraan Berhasil Diupdate");
        } catch (\Throwable $th) {
            return $this->ResReturn(false, "Kendaraan Gagal Diupdate");
        }
    }
    public function destroy($kendaraan)
    {
        try {
            $this->KendaraanRepository->destroy($kendaraan);
            return $this->ResReturn(true, "Kendaraan Berhasil Didelete");
        } catch (\Throwable $th) {
            return $this->ResReturn(false, "Kendaraan Gagal Didelete");
        }
    }
}
