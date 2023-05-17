<?php

namespace App\Services\Stok;

use App\Models\Stok;
use Illuminate\Support\Facades\Log;
use App\Repositories\Stok\StokRepository;
use App\Traits\ReturnResponse;

class StokService{
    use ReturnResponse;
    private StokRepository $stokRepository;

    public function __construct(StokRepository $stokRepository)
    {
        $this->stokRepository = $stokRepository;
    }

    public function getAllStok()
    {
        return $this->stokRepository->getAllStock();
    }
    public function CreateStok($request)
    {
        try {
            $stok = $this->stokRepository->getStok($request)->toArray();
            if ($stok != null) {
                $data = [
                    'id' => $stok['_id'],
                    'jumlah' => $request['jumlah']
                ];
                $this->stokRepository->updateStok($data);
            }
            else{
                $this->stokRepository->createStok($request);
            }
            return $this->ResReturn(true, "Data Berhasil Ditambah/Diupdate");
        } catch (\Exception $ex) {
            return $ex->getMessage();
            return [];
        }
    }

}

