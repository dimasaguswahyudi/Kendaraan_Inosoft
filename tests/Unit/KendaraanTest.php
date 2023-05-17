<?php

namespace Tests\Unit;

use App\Models\Mobil;
use App\Models\Kendaraan;
use App\Models\Motor;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class KendaraanTest extends TestCase
{
    public function create()
    {
        $kendaraan1 = Kendaraan::create([
            'tahun_keluaran' => 2017,
            'warna' => "Biru Macho",
            'harga' => 18727,
        ]);

        $mobil = Mobil::create([
            'kendaraan_id' => $kendaraan1->_id,
            'mesin' => "M62762",
            'kapasitas_penumpang' => 6,
            'tipe' => "T72h"
        ]);

        $kendaraan2 = Kendaraan::create([
            'tahun_keluaran' => 2017,
            'warna' => "Biru Macho",
            'harga' => 18727,
        ]);

        $motor = Motor::create([
            'kendaraan_id' => $kendaraan2->_id,
            'mesin' => "M333",
            'tipe_suspensi' => "T827",
            'tipe_transmisi' => "T72h"
        ]);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->create();
        $this->assertTrue(true);
    }
}
