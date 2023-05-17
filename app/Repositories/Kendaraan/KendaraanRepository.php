<?php

namespace App\Repositories\Kendaraan;

use App\Models\Kendaraan;
use App\Models\Mobil;

//use Your Model

/**
 * Class KendaraanRepository.
 */
class KendaraanRepository
{
    protected $kendaraan;
    public function __construct(Kendaraan $kendaraan)
    {
        $this->kendaraan = $kendaraan;
    }

    public function getStok()
    {
        $data = $this->kendaraan::with('mobil.stok', 'motor.stok')->select('tahun_keluaran', 'warna', 'harga')->get();
        return $data;
    }

    public function getAllKendaraan()
    {
        $data = $this->kendaraan->get();
        return $data;
    }

    public function createKendaraan($request)
    {
        return $this->kendaraan->create($request);
    }
    public function updateKendaraan($request, $kendaraan)
    {
        $data = $kendaraan->update($request);
        return $data;
    }
}
