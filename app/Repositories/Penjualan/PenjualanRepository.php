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

    public function index()
    {
        $data = $this->penjualan->with('kendaraan')->get();
        return $data;
    }

    public function store($request)
    {
        $data = $this->penjualan->create($request);
        return $data;
    }
    public function update($request, $penjualan)
    {
        $penjualan->update($request);
        return $penjualan;
    }
    public function destroy($penjualan)
    {
        return $penjualan->delete();
    }
}
