<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $collection) {
            $collection->char('kendaraan_id');
            $collection->foreign('kendaraan_id')
                ->references('_id')
                ->on('kendaraans')
                ->onUpdate('cascade')->onDelete('restrict');
            $collection->bigInteger('jumlah');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualans');
    }
}
