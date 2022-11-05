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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');

            $table->text('extract')->nullable();
            $table->longText('body')->nullable();
            //vamos a especificar que solo pueden ingresarse dos valores
            $table->enum('status',[1,2])->default(1);
            
            //relacionamos con nuestras otras tablas
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categoria_id');

            //agregamos restricción de llave foranea
            //indicamos que si el usuario se da de baja del sistema los cursos regisrados por el, también serán eliminados
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            
            
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
        Schema::dropIfExists('cursos');
    }
};
