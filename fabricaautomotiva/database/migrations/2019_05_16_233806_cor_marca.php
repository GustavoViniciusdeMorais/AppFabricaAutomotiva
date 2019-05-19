<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CorMarca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cor_marca', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('cor_id');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('cor_id')->references('id')->on('cors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('cor_marca');
    }
}
