<?php

namespace Tests\Unit;

use App\Models\Kendaraan;
use App\Models\Penjualan;
use App\Models\Stok;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class PenjualanTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function create()
    {
        $kendaraan = Kendaraan::create([
            'tahun_keluaran' => 2071,
            'warna' => "Merah Jingga",
            'harga' => 1562662,
        ]);

        $stok = Stok::create([
            'kendaraan_id' => $kendaraan->_id,
            'jumlah' => 100,
        ]);

        $this->add_penjualan($kendaraan, $stok);
    }
    public function add_penjualan($kendaraan, $stok)
    {
        $result = Penjualan::create([
            'kendaraan_id' => $kendaraan->_id,
            'jumlah' => 50
        ]);
        $stok = $stok->update([
            'jumlah' => $stok->jumlah - $result->jumlah
        ]);
    }
    public function testBasicTest()
    {
        $this->create();
        $this->assertTrue(true);
    }
}
