<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stok extends Model
{
    use HasFactory, SoftDeletes;
    protected $collection = 'stoks';
    protected $connection = 'mongodb';
    protected $fillable = [
        'kendaraan_id', 'jumlah'
    ];


    /**
     * Get the user that owns the Stok
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mobil(): BelongsTo
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }

    /**
     * Get the user that owns the Stok
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function motor(): BelongsTo
    {
        return $this->belongsTo(Motor::class, 'motor_id');
    }
}
