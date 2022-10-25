<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_etiqueta', function (Blueprint $table) {
            $table->id();

            //laves foraneas
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('etiqueta_id');
            
            //Restricciones de la llave foranea
            //establecemos que si se elimina un curso o etiqueta se eliminara el registro de la tabla de etiquetas también 
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('etiqueta_id')->references('id')->on('etiquetas')->onDelete('cascade');


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
        Schema::dropIfExists('curso_etiqueta');
    }
};
