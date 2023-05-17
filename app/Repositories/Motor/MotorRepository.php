<?php

namespace App\Repositories\Motor;

use App\Models\Motor;

//use Your Model

/**
 * Class MotorRepository.
 */
class MotorRepository
{
    protected $motor;
    public function __construct(Motor $motor)
    {
        $this->motor = $motor;
    }

    public function getAllMotor()
    {
        $data = $this->motor->get();
        return $data;
    }
    public function createMotor($request)
    {
        $data = $this->motor->create($request);
        return $data;
    }
    public function updateMotor($request, Motor $motor)
    {
        $data = $motor->update($request);
        return $data;
    }

}
