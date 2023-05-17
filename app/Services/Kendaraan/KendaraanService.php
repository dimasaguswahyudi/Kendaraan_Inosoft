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

    public function getAllKendaraan()
    {
        return $this->KendaraanRepository->getAllKendaraan();
    }

    public function createKendaraan($request)
    {
        $this->KendaraanRepository->createKendaraan($request);
        return $this->ResReturn(true, "Data Berhasil Ditambah");
    }
    public function updateKendaraan($request, $kendaraan)
    {
        $this->KendaraanRepository->updateKendaraan($request, $kendaraan);
        return $this->ResReturn(true, "Data Berhasil Diupdate");
    }
}
