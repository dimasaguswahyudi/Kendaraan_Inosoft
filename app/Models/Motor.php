<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Motor extends Model
{
    use HasFactory;
    protected $collection = 'motors';
    protected $connection = 'mongodb';
    protected $fillable = [
        'kendaraan_id', 'mesin', 'tipe_suspensi', 'tipe_transmisi'
    ];

    /**
     * Get the user associated with the Motor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stok(): HasOne
    {
        return $this->hasOne(Stok::class, 'motor_id', '_id');
    }

}
