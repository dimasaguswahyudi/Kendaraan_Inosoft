<?php

namespace App\Services\Mobil;

use App\Repositories\Mobil\MobilRepository;
use App\Traits\ReturnResponse;

class MobilService{
    use ReturnResponse;
    private MobilRepository $mobilRepository;
    public function __construct(MobilRepository $mobilRepository)
    {
        $this->mobilRepository = $mobilRepository;
    }
    public function getAllMobil()
    {
        return $this->mobilRepository->getAllMobil();
    }
    public function createMobil($request)
    {
        $this->mobilRepository->createMobil($request);
        return $this->ResReturn(true, "Data Berhasil Ditambah");
    }
    public function updateMobil($request, $mobil)
    {
        $this->mobilRepository->updateMobil($request, $mobil);
        return $this->ResReturn(true, "Data Berhasil Diupdate");
    }
}

