<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    public $kendaraan;

    public function __construct($limit = 1)
    {
        $kendaraan = Kendaraan::all();
        $this->kendaraan = $kendaraan;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color = ['merah','jingga','kuning','hijau','biru','nila','ungu'];
        for ($i=0; $i < 30; $i++) {
            Kendaraan::create([
                'tahun_keluaran' => 20 . rand(10, 22),
                'warna' => Arr::random($color),
                'harga' => 100 . rand(0000, 9999),
            ]);
        }
    }
}
