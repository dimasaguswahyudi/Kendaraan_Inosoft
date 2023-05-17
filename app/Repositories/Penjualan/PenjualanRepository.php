<?php

namespace App\Repositories\Penjualan;

use App\Models\Penjualan;
use App\Repositories\Penjualan\PenjualanRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class PenjualanRepository.
 */
class PenjualanRepository
{
    protected $penjualan;

    public function __construct(Penjualan $penjualan)
    {
        $this->penjualan = $penjualan;
    }

    public function getAllPenjualan()
    {
        return $this->penjualan->with('kendaraan')->get();
    }
    public function getPenjualan($kendaraan_id)
    {
        $penjualan = $this->penjualan->with('kendaraan.mobil', 'kendaraan.motor')->where('kendaraan_id', $kendaraan_id)->get();
        return $penjualan;
    }
    public function store($request)
    {
        $data = $this->penjualan->create($request);
        return $data;
    }
    public function updatePenjualan($request, $penjualan)
    {
        $penjualan->kendaraan_id = $request['kendaraan_id'];
        $penjualan->jumlah = $request['jumlah'];
        $penjualan->save();
        return $penjualan;
    }
}
