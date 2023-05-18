<?php

namespace App\Repositories\Mobil;

use App\Models\Mobil;

//use Your Model

/**
 * Class MobilRepository.
 */
class MobilRepository
{
    protected $mobil;
    public function __construct(Mobil $mobil)
    {
        $this->mobil = $mobil;
    }
    public function getAllMobil()
    {
        $data = $this->mobil->get();
        return $data;
    }
    public function createMobil($request)
    {
        $data = $this->mobil->create($request);
        return $data;
    }
    public function updateMobil($request, $mobil)
    {
        $data = $mobil->update($request);
        return $data;
    }
    public function destroy($mobil)
    {
        return $mobil->delete();
    }

}
