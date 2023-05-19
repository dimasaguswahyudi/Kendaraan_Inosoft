<?php

namespace App\Services\Mobil;

use App\Repositories\Kendaraan\KendaraanRepository;
use App\Repositories\Mobil\MobilRepository;
use App\Repositories\Stok\StokRepository;
use App\Traits\ReturnResponse;

class MobilService{
    use ReturnResponse;
    private MobilRepository $mobilRepository;
    private KendaraanRepository $kendaraanRepository;
    private StokRepository $stokRepository;
    public function __construct(MobilRepository $mobilRepository, KendaraanRepository $kendaraanRepository, StokRepository $stokRepository)
    {
        $this->mobilRepository = $mobilRepository;
        $this->kendaraanRepository = $kendaraanRepository;
        $this->stokRepository = $stokRepository;
    }
    public function index()
    {
        return $this->mobilRepository->index();
    }
    public function store($request)
    {
        try {
            $kendaraan = $this->kendaraanRepository->find($request['kendaraan_id']);
            if ($kendaraan != null) {
                $mobil = $this->mobilRepository->store($request);
                $request['mobil_id'] = $mobil->id;
                $this->stokRepository->create($request);
                return $this->ResReturn(true, "Mobil Berhasil Diinput");
            }
            else{
                return $this->ResReturn(false, "Kendaraan Sudah Memiliki Mobil/Motor");
            }
        } catch (\Throwable $th) {
            return $this->ResReturn(false, "Data Gagal Dinput");
        }
    }
    public function update($request, $mobil)
    {
        try {
            $mobil = $this->mobilRepository->update($request, $mobil);
            $request['id'] = $mobil->stok->id;
            $this->stokRepository->update($request);
            return $this->ResReturn(true, "Data Berhasil Diupdate");
        } catch (\Throwable $th) {
            return $this->ResReturn(false, "Data Gagal Diupdate");
        }
    }
    public function destroy($mobil)
    {
        return $this->mobilRepository->destroy($mobil);
    }
}

