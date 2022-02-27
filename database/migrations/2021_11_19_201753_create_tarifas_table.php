<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('precio_fijo');
            $table->float('precio_variable');
            $table->float('consumo_maximo');
            $table->float('consumo_minimo');
            $table->bigInteger('tarifario_id')->unsigned();
            $table->bigInteger('categoria_id')->unsigned();            
            $table->bigInteger('subcategoria_id')->unsigned();                      
            $table->timestamps();
            // FKs
            $table->foreign('tarifario_id')->references('id')->on('tarifarios')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('luz_tarifas');
    }
}
