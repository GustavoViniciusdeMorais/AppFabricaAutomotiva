<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Carros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('cor_id');
            $table->unsignedBigInteger('modelo_id');
            $table->integer('ano');
            $table->string('foto')->nullable();
            $table->float('valor');

            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('cor_id')->references('id')->on('cors');
            $table->foreign('modelo_id')->references('id')->on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carros');
    }
}
