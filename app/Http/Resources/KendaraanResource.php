<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class KendaraanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (Route::is('kendaraan.stok') ) {
            return [
                '_id' => $this->_id,
                'tahun_keluaran' => $this->tahun_keluaran,
                'warna' => $this->warna,
                'harga' => $this->harga,
                'mobil' => [
                    'mesin' => $this->mobil->mesin ?? null,
                    'kapasitas_penumpang' => $this->mobil->kapasitas_penumpang ?? null,
                    'tipe' => $this->mobil->tipe ?? null,
                    'stok' => $this->mobil->stok->jumlah ?? null,
                ],
                'motor' => [
                    'mesin' => $this->motor->mesin ?? null,
                    'tipe_suspensi' => $this->motor->tipe_suspensi ?? null,
                    'tipe_transmisi' => $this->motor->tipe_transmisi ?? null,
                    'stok' => $this->motor->stok->jumlah ?? null,
                ]
            ];
        }
        else{
            return parent::toArray($request);
        }
    }
}
