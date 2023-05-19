<?php

namespace App\Services\Motor;

use App\Traits\ReturnResponse;
use App\Repositories\Stok\StokRepository;
use App\Repositories\Motor\MotorRepository;
use App\Repositories\Kendaraan\KendaraanRepository;

class MotorService {
    use ReturnResponse;
    private MotorRepository $motorRepository;
    private KendaraanRepository $kendaraanRepository;
    private StokRepository $stokRepository;
    public function __construct(MotorRepository $motorRepository, KendaraanRepository $kendaraanRepository, StokRepository $stokRepository)
    {
        $this->motorRepository = $motorRepository;
        $this->kendaraanRepository = $kendaraanRepository;
        $this->stokRepository = $stokRepository;
    }

    public function index()
    {
        return $this->motorRepository->index();
    }
    public function store($request)
    {
        try {
            $kendaraan = $this->kendaraanRepository->find($request['kendaraan_id']);
            if ($kendaraan != null) {
                $motor = $this->motorRepository->store($request);
                $request['motor_id'] = $motor->id;
                $this->stokRepository->create($request);
                return $this->ResReturn(true, "Motor Berhasil Diinput");
            }
            else{
                return $this->ResReturn(false, "Kendaraan Sudah Memiliki Mobil/Motor");
            }
        } catch (\Throwable $th) {
            return $this->ResReturn(false, "Data Gagal Dinput");
        }
    }
    public function update($request, $motor)
    {
        try {
            $motor = $this->motorRepository->update($request, $motor);
            $request['id'] = $motor->stok->id;
            $this->stokRepository->update($request);
            return $this->ResReturn(true, "Data Berhasil Diupdate");
        } catch (\Throwable $th) {
            return $this->ResReturn(false, "Data Gagal Diupdate");
        }
    }
    public function destroy($motor)
    {
        try {
            if ($motor->stok != null) {
                $this->stokRepository->destroy($motor->stok);
            }
            $this->motorRepository->destroy($motor);
            return $this->ResReturn(true, "Motor Berhasil Didelete");
        } catch (\Throwable $th) {
            return $this->ResReturn(false, "Motor Gagal Didelete");
        }
    }
}
