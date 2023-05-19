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
    private StokRepository $stokRepository;

    public function __construct(PenjualanRepository $penjualanRepository, KendaraanRepository $kendaraanRepository, StokRepository $stokRepository)
    {
        $this->penjualanRepository = $penjualanRepository;
        $this->kendaraanRepository = $kendaraanRepository;
        $this->stokRepository = $stokRepository;
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
            $kendaraan = $this->kendaraanRepository->hasStok($request['kendaraan_id']);
            if ($kendaraan != null) {
                $stok = $kendaraan->mobil->stok ?? $kendaraan->motor->stok;
                if ($stok != null) {
                    if ($stok->jumlah >= $request['jumlah']) {
                        $this->penjualanRepository->store($request);
                        $data['id'] = $stok->id;
                        $data['jumlah'] = $stok->jumlah - $request['jumlah'];
                        $this->stokRepository->update($data);
                        return $this->ResReturn(true,"Data Berhasil DiInput");
                    }
                    else{
                        return $this->ResReturn(false,"Penjualan Melebihi Stok");
                    }
                }
                else{
                    return $this->ResReturn(false,"Kendaraan Tidak Memiliki Stok");
                }
            }
            else{
                return $this->ResReturn(false,"Kendaraan Tidak Memiliki Mobil/Motor/Stok");
            }
        } catch (\Throwable $th) {
            return $this->ResReturn(false,"Data Gagal DiInput");
        }
    }
    public function update($request, $penjualan)
    {
        try {
            $kendaraan = $penjualan->kendaraan;
            if ($kendaraan != null) {
                $stok = $kendaraan->mobil->stok ?? $kendaraan->motor->stok;
                if ($stok != null) {
                    if ($stok->jumlah >= $request['jumlah']) {
                        $this->penjualanRepository->update($request, $penjualan);
                        $data['id'] = $stok->id;
                        $data['jumlah'] = $stok->jumlah - $request['jumlah'];
                        $this->stokRepository->update($data);
                        return $this->ResReturn(true,"Data Berhasil DiUpdate");
                    }
                    else{
                        return $this->ResReturn(false,"Penjualan Melebihi Stok");
                    }
                }
                else{
                    return $this->ResReturn(false,"Kendaraan Tidak Memiliki Stok");
                }
            }
            else{
                return $this->ResReturn(false,"Kendaraan Tidak Memiliki Mobil/Motor/Stok");
            }
        } catch (\Throwable $th) {
            return $this->ResReturn(false,"Data Gagal DiUpdate");
        }
    }
    public function destroy($penjualan)
    {
        try {
            $stok = $penjualan->kendaraan->mobil->stok ?? $penjualan->kendaraan->motor->stok;
            $data['id'] = $stok->id;
            $data['jumlah'] = $stok->jumlah + $penjualan->jumlah;
            $this->stokRepository->update($data);
            $this->penjualanRepository->destroy($penjualan);
            return $this->ResReturn(true,"Berhasil Menghapus Penjualan");
        } catch (\Throwable $th) {
            return $this->ResReturn(false,"Gagal Menghapus Penjualan");
        }
    }
}

