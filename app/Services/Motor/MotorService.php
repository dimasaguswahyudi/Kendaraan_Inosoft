<?php

namespace App\Services\Motor;

use App\Repositories\Motor\MotorRepository;
use App\Traits\ReturnResponse;

class MotorService {
    use ReturnResponse;
    private MotorRepository $motorRepository;
    public function __construct(MotorRepository $motorRepository)
    {
        $this->motorRepository = $motorRepository;
    }

    public function getAllMotor()
    {
        return $this->motorRepository->getAllMotor();
    }
    public function createMotor($request)
    {
        $this->motorRepository->createMotor($request);
        return $this->ResReturn(true, "Data Berhasil Ditambah");
    }
    public function updateMotor($request, $motor)
    {
        $this->motorRepository->updateMotor($request, $motor);
        return $this->ResReturn(true, "Data Berhasil Diupdate");
    }
}
