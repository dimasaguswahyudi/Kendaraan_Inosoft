<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoks', function (Blueprint $collection) {

            $collection->char('mobil_id');
            $collection->foreign('mobil_id')
                ->references('_id')
                ->on('mobils')
                ->onUpdate('cascade')->onDelete('restrict');

            $collection->char('motor_id');
            $collection->foreign('motor_id')
                ->references('_id')
                ->on('motors')
                ->onUpdate('cascade')->onDelete('restrict');

            $collection->bigInteger('jumlah');
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
        Schema::dropIfExists('stoks');
    }
}
