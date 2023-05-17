<?php

namespace Database\Seeders;

use App\Models\Stok;
use Illuminate\Database\Seeder;
use Database\Seeders\KendaraanSeeder;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $kendaraanSeeder = new KendaraanSeeder();
        $mobilSeeder = new MobilSeeder();
        $motorSeeder = new MotorSeeder();

        foreach ($mobilSeeder->mobil as $key => $value) {
            Stok::create([
                'mobil_id' => $value->id,
                'motor_id' => null,
                'jumlah' => rand(100,1000),
            ]);
        }

        foreach ($motorSeeder->motor as $key => $value) {
            Stok::create([
                'mobil_id' => null,
                'motor_id' => $value->id,
                'jumlah' => rand(100,1000),
            ]);
        }
    }
}
