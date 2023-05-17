<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Seeder;
use Database\Seeders\KendaraanSeeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kendaraanSeeder = new KendaraanSeeder();

        foreach ($kendaraanSeeder->kendaraan as $key => $value) {
            Penjualan::create([
                'kendaraan_id' => $value->id,
                'jumlah' => rand(10,100),
            ]);
        }
    }
}
