<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion_racks', function (Blueprint $table) {
            $table->id();
            $table->integer('id_rack');
            $table->string('posicion');
            $table->integer('estado_app')->default(0);

            $table->unsignedBigInteger('sensor_id')->nullable()->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sensor_id')->references('id')->on('sensors');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacion_racks');
    }
};
