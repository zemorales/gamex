<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComisionBoletoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comision_boleto', function (Blueprint $table) {
            $table->id();
            $table->string('valor_comision');
            $table->string('porcentaje_cobrado');
            $table->bigInteger('categoria_comision_id')->unsigned();
            $table->foreign('categoria_comision_id')->references('id')->on('categorias_comision')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('boleto_id')->unsigned();
            $table->foreign('boleto_id')->references('id')->on('boletos')
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
        Schema::dropIfExists('comision_boleto');
    }
}
