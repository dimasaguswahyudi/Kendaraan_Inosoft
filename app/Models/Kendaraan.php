<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\HasOne;
use Jenssegers\Mongodb\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Kendaraan extends Model
{
    use HasFactory;
    protected $collection = 'kendaraans';
    protected $connection = 'mongodb';
    protected $fillable = [
        'tahun_keluaran', 'warna', 'harga'
    ];

    /**
     * Get the user associated with the Kendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function motor(): HasOne
    {
        return $this->hasOne(Motor::class, 'kendaraan_id', '_id');
    }

    /**
     * Get the user associated with the Kendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mobil(): HasOne
    {
        return $this->hasOne(Mobil::class, 'kendaraan_id', '_id');
    }

    /**
     * Get all of the comments for the Kendaraan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualan(): HasMany
    {
        return $this->hasMany(Penjualan::class, 'kendaraan_id', '_id');
    }

}
