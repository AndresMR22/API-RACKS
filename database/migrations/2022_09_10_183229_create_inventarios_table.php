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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->decimal('altura')->nullable();
            $table->decimal('ancho')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('nombre')->nullable();
            $table->string('estado_espacio')->default('inactivo');
            $table->unsignedBigInteger('ubicacion_id');
            $table->foreign('ubicacion_id')->references('id')->on('ubicacion_racks')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('rack_id');
            $table->foreign('rack_id')->references('id')->on('racks');
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
        Schema::dropIfExists('inventarios');
    }
};
