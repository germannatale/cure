<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbienteArtefactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambiente_artefacto', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();           
            $table->bigInteger('ambiente_id')->unsigned();
            $table->bigInteger('artefacto_id')->unsigned();
            $table->timestamps();
            // FKs
            $table->foreign('ambiente_id')->references('id')->on('ambientes')->onDelete('cascade');
            $table->foreign('artefacto_id')->references('id')->on('artefactos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ambiente_artefacto');
    }
}
