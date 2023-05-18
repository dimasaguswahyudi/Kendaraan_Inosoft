<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobil extends Model
{
    use HasFactory, SoftDeletes;
    protected $collection = 'mobils';
    protected $connection = 'mongodb';
    protected $fillable = [
        'kendaraan_id', 'mesin', 'kapasitas_penumpang', 'tipe'
    ];

    /**
     * Get the user associated with the Mobil
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stok(): HasOne
    {
        return $this->hasOne(Stok::class, 'mobil_id', 'id');
    }
}
