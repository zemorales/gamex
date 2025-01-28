<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreventaBoletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preventa_boletos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio_prev');
            $table->date('fecha_final_prev');
            $table->string('valor_boleto');
            $table->enum('categoria', array('precio_visitante', 'precio_competidor'));
            $table->bigInteger('torneo_id')->unsigned();
            $table->foreign('torneo_id')->references('id')->on('torneos')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('preventa_boletos');
    }
}
