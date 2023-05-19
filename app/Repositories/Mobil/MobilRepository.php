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
    public function index()
    {
        $data = $this->mobil::all();
        return $data;
    }
    public function store($request)
    {
        $data = $this->mobil->create($request);
        return $data;
    }
    public function update($request, $mobil)
    {
        $mobil->update($request);
        return $mobil;
    }
    public function destroy($mobil)
    {
        return $mobil->delete();
    }

}
