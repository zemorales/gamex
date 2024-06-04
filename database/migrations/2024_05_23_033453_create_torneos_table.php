<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();            
            $table->string('nombre_torneo');
            $table->FLOAT('precio_visitante');
            $table->FLOAT('precio_competidor');            

            $table->bigInteger('juego_id')->unsigned();
            $table->foreign('juego_id')->references('id')->on('juegos')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->dateTime('fecha');
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
        Schema::dropIfExists('torneos');
    }
}
