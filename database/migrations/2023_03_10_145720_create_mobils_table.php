<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $collection) {
            $collection->char('kendaraan_id');
            $collection->foreign('kendaraan_id')
                ->references('_id')
                ->on('kendaraans')
                ->onUpdate('cascade')->onDelete('restrict');
            $collection->string('mesin');
            $collection->string('kapasitas_penumpang');
            $collection->string('tipe');
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
        Schema::dropIfExists('mobils');
    }
}
