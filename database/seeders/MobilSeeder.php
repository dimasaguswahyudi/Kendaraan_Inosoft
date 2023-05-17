<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\KendaraanSeeder;

class MobilSeeder extends Seeder
{
    public $mobil;

    public function __construct($limit = 1)
    {
        $mobil = Mobil::all();
        $this->mobil = $mobil;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kendaraanSeeder = new KendaraanSeeder();

        for ($i = 0; $i < 15; $i++) {
            Mobil::create([
                'kendaraan_id' => $kendaraanSeeder->kendaraan[$i]['id'],
                'mesin' => 'M' . rand(10,100),
                'kapasitas_penumpang' => '4',
                'tipe' => 'T' . Str::random(5),
            ]);
        }
    }
}
