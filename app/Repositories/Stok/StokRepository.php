<?php

namespace App\Repositories\Stok;

use App\Models\Stok;

//use Your Model

/**
 * Class StokRepository.
 */
class StokRepository
{
    protected $stok;

    public function __construct(Stok $stok)
    {
        $this->stok = $stok;
    }

    public function getStok($request)
    {
        $data = $this->stok->where('kendaraan_id', $request['kendaraan_id'])->first();
        return $data;
    }
    public function getAllStock()
    {
        $data = $this->stok->with('mobil', 'motor')->get();
        return $data;
    }
    public function create($request)
    {
        $data = $this->stok->create([
            'mobil_id' => $request['mobil_id'] ?? null,
            'motor_id' => $request['motor_id'] ?? null,
            'jumlah' => $request['jumlah'],
        ]);
        return $data;
    }
    public function update($request)
    {
        $data = $this->stok->find($request['id'])->update([
            'jumlah' => $request['jumlah'],
        ]);
        return $data;
    }
    public function destroy($stok)
    {
        $stok->delete();
        return $stok;
    }
}
