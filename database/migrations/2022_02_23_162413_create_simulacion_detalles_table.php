<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulacionDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulacion_detalles', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('simulacion_id')->unsigned();
            $table->string('ambiente');
            $table->string('artefacto');
            $table->string('consumo_artefacto');
            $table->string('gasto_artefacto');
            $table->timestamps();
            // Foreign key
            $table->foreign('simulacion_id')->references('id')->on('simulaciones');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simulacion_detalles');
    }
}
