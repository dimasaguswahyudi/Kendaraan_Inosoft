<?php

namespace App\Services\Penjualan;

use Illuminate\Support\Facades\Log;
use App\Repositories\Penjualan\PenjualanRepository;
use App\Repositories\Stok\StokRepository;
use App\Traits\ReturnResponse;

class PenjualanService{
    use ReturnResponse;
    private PenjualanRepository $penjualanRepository;
    private StokRepository $stokRepository;

    public function __construct(PenjualanRepository $penjualanRepository, StokRepository $stokRepository)
    {
        $this->penjualanRepository = $penjualanRepository;
        $this->stokRepository = $stokRepository;
    }

    public function getAllPenjualan()
    {
        return $this->penjualanRepository->getAllPenjualan();
    }

    public function getPenjualan($kendaraan_id)
    {
        return $this->penjualanRepository->getPenjualan($kendaraan_id);
    }

    public function store($request)
    {
        try {
            $stok = $this->stokRepository->getStok($request)->toArray();
            if ($request['jumlah'] > $stok['jumlah']) {
                return $this->ResReturn(false, "Penjualan Barang Melebihi Stok");
            }
            else{
                $return = $this->penjualanRepository->store($request);
                $data = [
                    'id' => $stok['_id'],
                    'jumlah' => $stok['jumlah'] - $return['jumlah']
                ];
                $this->stokRepository->updateStok($data);
                return $this->ResReturn(true,"Data Berhasil Ditambahkan");
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
    public function updatePenjualan($request, $penjualan)
    {
        try {
            $stok = $this->stokRepository->getStok($request)->toArray();
            if ($request['jumlah'] > $stok['jumlah']) {
                return $this->ResReturn(false, "Penjualan Barang Melebihi Stok");
            }
            else{
                $return = $this->penjualanRepository->updatePenjualan($request, $penjualan);
                $data = [
                    'id' => $stok['_id'],
                    'jumlah' => $stok['jumlah'] - $return['jumlah']
                ];
                $this->stokRepository->updateStok($data);
                return $this->ResReturn(true,"Data Berhasil Diupdate");
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}

