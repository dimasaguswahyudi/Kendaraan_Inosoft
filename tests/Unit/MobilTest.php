<?php

namespace Tests\Unit;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\Stok;
use PHPUnit\Framework\TestCase;

class MobilTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create()
    {
        // $this->assertTrue(true);
        $kendaraan = new Kendaraan();
        $kendaraan->tahun_keluaran = 2021;
        $kendaraan->warna = "Ungu Unyu";
        $kendaraan->harga = 2000000;

        $this->assertEquals(2021, $kendaraan->tahun_keluaran);
        $this->assertEquals('Ungu Unyu', $kendaraan->warna);
        $this->assertEquals(2000000,  $kendaraan->harga);

        $mobil = new Mobil();
        $mobil->kendaraan_id = $kendaraan->_id;
        $mobil->mesin = "M555";
        $mobil->kapasitas_penumpang = "5";
        $mobil->tipe = "HEWEQWEH";

        $this->assertEquals($kendaraan->_id, $mobil->kendaraan_id);
        $this->assertEquals('M555', $mobil->mesin);
        $this->assertEquals('5',  $mobil->kapasitas_penumpang);
        $this->assertEquals('HEWEQWEH',  $mobil->tipe);

        $stok = new Stok();
        $stok->mobil_id = $mobil->_id;
        $stok->jumlah = 200;

        $this->assertEquals($mobil->_id, $stok->mobil_id);
        $this->assertEquals(200, $stok->jumlah);
    }
}
