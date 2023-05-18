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
        return $this->KendaraanRepository->store($request);
    }
    public function update($request, $kendaraan)
    {
        return $this->KendaraanRepository->update($request, $kendaraan);
    }
    public function destroy($kendaraan)
    {
        $data = $this->KendaraanRepository->destroy($kendaraan);
        if ($data == true) {
            return $this->ResReturn(true, "Data Berhasil Dihapus");
        }
        else{
            return $this->ResReturn(false, "Data Gagal Dihapus");
        }
    }
}
