<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneosHasUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos_has_usuarios', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_usuario', array('admin', 'participante', 'visitante','responsable'));

            $table->bigInteger('torneo_id')->unsigned();
            $table->foreign('torneo_id')->references('id')->on('torneos')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('torneos_has_usuarios');
    }
}
