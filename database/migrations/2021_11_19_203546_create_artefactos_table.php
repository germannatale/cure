<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtefactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artefactos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('artefacto_tipo_id')->unsigned();            
            $table->string('energia_id');
            $table->float('consumo_hora');
            $table->float('horas_uso_prom');
            $table->float('calor_residual')->nullable();           
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();
            // FKs
            $table->foreign('artefacto_tipo_id')->references('id')->on('artefacto_tipos');            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artefactos');
    }
}
