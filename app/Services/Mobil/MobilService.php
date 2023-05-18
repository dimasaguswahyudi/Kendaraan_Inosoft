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
    public function index()
    {
        return $this->mobilRepository->index();
    }
    public function store($request)
    {
        return $this->mobilRepository->store($request);
    }
    public function updateMobil($request, $mobil)
    {
        $this->mobilRepository->updateMobil($request, $mobil);
        return $this->ResReturn(true, "Data Berhasil Diupdate");
    }
    public function destroy($mobil)
    {
        return $this->mobilRepository->destroy($mobil);
    }
}

