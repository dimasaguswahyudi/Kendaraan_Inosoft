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
        $data = $this->kendaraan::with('mobil.stok', 'motor.stok')->get();
        return $data;
    }

    public function getPenjulan()
    {
        $data = $this->kendaraan::has('penjualan')->with('penjualan')->get();
        return $data;
    }

    public function getPenjualanperKendaraan($kendaraan_id)
    {
        $data = $this->kendaraan->has('penjualan')->with('penjualan')->find($kendaraan_id);
        return $data;
    }

    public function index()
    {
        $data = $this->kendaraan->get();
        return $data;
    }

    public function find($request)
    {
        $data = $this->kendaraan->orDoesntHave('mobil')->DoesntHave('motor')->find($request);
        return $data;
    }

    public function hasStok($request)
    {
        $data = $this->kendaraan->has('mobil')->orHas('motor')->find($request);
        return $data;
    }

    public function store($request)
    {
        $data = $this->kendaraan->create($request);
        return $data;
    }
    public function update($request, $kendaraan)
    {
        $kendaraan->update($request);
        return $kendaraan;
    }
    public function destroy($kendaraan)
    {
         if ($kendaraan->mobil != null) {
            $kendaraan->mobil->delete();
         }
         else if ($kendaraan->motor != null) {
            $kendaraan->motor->delete();
         }
         return $kendaraan->delete();
    }
}
