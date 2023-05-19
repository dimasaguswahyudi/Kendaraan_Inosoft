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

    public function index()
    {
        $data = $this->motor->get();
        return $data;
    }
    public function store($request)
    {
        $data = $this->motor->create($request);
        return $data;
    }
    public function update($request, Motor $motor)
    {
        $motor->update($request);
        return $motor;
    }
    public function destroy($motor)
    {
        return $motor->delete();
    }

}
