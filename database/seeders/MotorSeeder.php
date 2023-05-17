<?php

namespace Database\Seeders;

use App\Models\Motor;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\KendaraanSeeder;

class MotorSeeder extends Seeder
{
    public $motor;

    public function __construct($limit = 1)
    {
        $motor = Motor::all();
        $this->motor = $motor;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kendaraanSeeder = new KendaraanSeeder();

        for ($i = 15; $i < 30; $i++) {
            Motor::create([
                'kendaraan_id' => $kendaraanSeeder->kendaraan[$i]['id'],
                'mesin' => 'M' . rand(10,100),
                'tipe_suspensi' => 'T' . Str::random(5),
                'tipe_transmisi' => 'T' . Str::random(5),
            ]);
        }
    }
}
