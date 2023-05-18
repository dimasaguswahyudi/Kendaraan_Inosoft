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

    public function index()
    {
        $data = $this->kendaraan->get();
        return $data;
    }

    public function store($request)
    {
        $data = $this->kendaraan->create($request);
        return $data;
    }
    public function updateKendaraan($request, $kendaraan)
    {
        $data = $kendaraan->update($request);
        return $data;
    }
}
