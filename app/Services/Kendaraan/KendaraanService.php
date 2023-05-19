<?php

namespace App\Services\Kendaraan;

use App\Repositories\Kendaraan\KendaraanRepository;
use App\Repositories\Mobil\MobilRepository;
use App\Repositories\Motor\MotorRepository;
use App\Repositories\Stok\StokRepository;
use App\Traits\ReturnResponse;

class KendaraanService
{
    use ReturnResponse;
    private KendaraanRepository $KendaraanRepository;
    private MobilRepository $mobilRepository;
    private MotorRepository $motorRepository;
    private StokRepository $stokRepository;

    public function __construct(KendaraanRepository $KendaraanRepository, MobilRepository $mobilRepository, StokRepository $stokRepository, MotorRepository $motorRepository)
    {
        $this->KendaraanRepository = $KendaraanRepository;
        $this->mobilRepository = $mobilRepository;
        $this->stokRepository = $stokRepository;
        $this->motorRepository = $motorRepository;
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
            if ($kendaraan->mobil != null) {
                if ($kendaraan->mobil->stok != null) {
                    $this->stokRepository->destroy($kendaraan->mobil->stok);
                }
                $this->mobilRepository->destroy($kendaraan->mobil);
            }
            else if ($kendaraan->motor != null) {
                if ($kendaraan->motor->stok != null) {
                    $this->stokRepository->destroy($kendaraan->motor->stok);
                }
                $this->motorRepository->destroy($kendaraan->mobil);
            }
            $this->KendaraanRepository->destroy($kendaraan);
            return $this->ResReturn(true, "Kendaraan Berhasil Didelete");
        } catch (\Throwable $th) {
            return $this->ResReturn(false, "Kendaraan Gagal Didelete");
        }
    }
}
