<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Resources\Json\JsonResource;

class PenjualanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'tahun_keluaran' => $this->tahun_keluaran,
            'warna' => $this->warna,
            'harga' => $this->harga,
            'penjualan' =>[
                'jumlah' => $this->penjualan
            ]
        ];
    }
}
