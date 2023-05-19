<?php

namespace Tests\Unit;

use App\Models\Stok;
use App\Models\Motor;
use App\Models\Kendaraan;
use PHPUnit\Framework\TestCase;

class MotorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create()
    {
        $kendaraan = new Kendaraan();
        $kendaraan->tahun_keluaran = 2021;
        $kendaraan->warna = "Ungu Unyu";
        $kendaraan->harga = 2000000;

        $this->assertEquals(2021, $kendaraan->tahun_keluaran);
        $this->assertEquals('Ungu Unyu', $kendaraan->warna);
        $this->assertEquals(2000000,  $kendaraan->harga);

        $motor = new Motor();
        $motor->kendaraan_id = $kendaraan->_id;
        $motor->mesin = "M64747";
        $motor->tipe_suspensi = "Tdewe2";
        $motor->tipe_transmisi = "TVSDS";

        $this->assertEquals($kendaraan->_id, $motor->kendaraan_id);
        $this->assertEquals('M64747', $motor->mesin);
        $this->assertEquals('Tdewe2',  $motor->tipe_suspensi);
        $this->assertEquals('TVSDS',  $motor->tipe_transmisi);

        $stok = new Stok();
        $stok->motor_id = $motor->_id;
        $stok->jumlah = 200;

        $this->assertEquals($motor->_id, $stok->motor_id);
        $this->assertEquals(200, $stok->jumlah);
    }
}
