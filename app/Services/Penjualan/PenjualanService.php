<?php

namespace App\Services\Penjualan;

use App\Repositories\Kendaraan\KendaraanRepository;
use Illuminate\Support\Facades\Log;
use App\Repositories\Penjualan\PenjualanRepository;
use App\Repositories\Stok\StokRepository;
use App\Traits\ReturnResponse;

class PenjualanService{
    use ReturnResponse;
    private PenjualanRepository $penjualanRepository;
    private KendaraanRepository $kendaraanRepository;

    public function __construct(PenjualanRepository $penjualanRepository, KendaraanRepository $kendaraanRepository)
    {
        $this->penjualanRepository = $penjualanRepository;
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function index()
    {
        $data = $this->kendaraanRepository->getPenjulan();
        return $data;
    }

    public function getPenjualan($kendaraan_id)
    {
        $data = $this->kendaraanRepository->getPenjualanperKendaraan($kendaraan_id);
        return $data;
    }

    public function store($request)
    {
        try {
            $kendaraan = $this->kendaraanRepository->find($request['kendaraan_id']);
            if ($kendaraan != null) {
                $this->penjualanRepository->store($request);
                return $this->ResReturn(true,"Data Berhasil DiInput");
            }
            else{
                return $this->ResReturn(false,"Kendaraan Tidak Memiliki Mobil/Motor");
            }
        } catch (\Throwable $th) {
            return $this->ResReturn(false,"Data Gagal DiInput");
        }
    }
    public function updatePenjualan($request, $penjualan)
    {
        // try {
        //     $stok = $this->stokRepository->getStok($request)->toArray();
        //     if ($request['jumlah'] > $stok['jumlah']) {
        //         return $this->ResReturn(false, "Penjualan Barang Melebihi Stok");
        //     }
        //     else{
        //         $return = $this->penjualanRepository->updatePenjualan($request, $penjualan);
        //         $data = [
        //             'id' => $stok['_id'],
        //             'jumlah' => $stok['jumlah'] - $return['jumlah']
        //         ];
        //         $this->stokRepository->updateStok($data);
        //         return $this->ResReturn(true,"Data Berhasil Diupdate");
        //     }
        // } catch (\Exception $ex) {
        //     return $ex->getMessage();
        // }
    }
}

