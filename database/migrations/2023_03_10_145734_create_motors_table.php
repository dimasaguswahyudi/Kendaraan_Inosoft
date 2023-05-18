<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $collection) {
            $collection->char('kendaraan_id');
            $collection->foreign('kendaraan_id')
                ->references('_id')
                ->on('kendaraans')
                ->onUpdate('cascade')->onDelete('restrict');
            $collection->string('mesin');
            $collection->string('tipe_suspensi');
            $collection->string('tipe_transmisi');
            $collection->timestamps();
            $collection->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motors');
    }
}
